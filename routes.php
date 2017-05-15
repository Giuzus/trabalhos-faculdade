<?php

    define("LANDING_CONTROLLER" ,"pages");
    define("LANDING_ACTION"     ,"home");
    

    define("DEFAULT_ACTION"     ,"index");
    define("CONTROLLER_INDEX"   ,0);
    define("ACTION_INDEX"       ,1);


    function getCurrentUri()
    {
        $basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
        $uri = substr($_SERVER['REQUEST_URI'], strlen($basepath));
        if (strstr($uri, '?'))
            $uri = substr($uri, 0, strpos($uri, '?'));

        $uri = trim($uri, '/');
        return $uri;
    }

    function getQueryString()
    {
        if(isset($_SERVER['REDIRECT_QUERY_STRING']))
        {
            return $_SERVER['REDIRECT_QUERY_STRING'];
        }

        return null;
    }

    function call($controller, $action, $parameters) {
        // require the file that matches the controller name
        require_once('controllers/' . $controller . '_controller.php');

        $controller = ucwords($controller) . 'Controller';

        $r = new ReflectionClass($controller);
        $obj = $r->newInstance();
        $method = new ReflectionMethod( $controller, $action );


        $method_parameters = $method->getParameters();
        
        $valid = true;

        foreach ($method_parameters as $m_param) {
            
            if( !(isset($parameters[$m_param->getName()]) || $m_param->isOptional()))
            {
                $valid = false;
                break;
            }
        }

        if($valid)
        {
            $method->invokeArgs( $obj, $parameters );
        }
        
    }

    


    $base_url = getCurrentUri();

    $routes = explode('/', $base_url);
   
    $controller = LANDING_CONTROLLER;
    $action     = LANDING_ACTION;

    $queryString = getQueryString();
    parse_str($queryString, $parameters);

    if(isset($routes[CONTROLLER_INDEX]) && $routes[CONTROLLER_INDEX] != null)
    {
        $controller = $routes[CONTROLLER_INDEX];
        if(isset($routes[ACTION_INDEX]) && $routes[ACTION_INDEX] != null)
        {
            $action = $routes[ACTION_INDEX];
        }
        else
        {
            $action = DEFAULT_ACTION;
        }
    }
    
    call($controller, $action, $parameters);

?>