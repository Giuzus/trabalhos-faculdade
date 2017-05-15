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

    function callError404()
    {
        call('pages','error404');
    }

    function call($controller, $action, $parameters = null) {

        $filename = 'controllers/' . $controller . '_controller.php';
        
        if (file_exists( $filename ))
        {
            require_once($filename);

            $existing_classes = get_declared_classes();
            $controller_class = ucwords($controller) . 'Controller';
            
            if(in_array($controller_class,$existing_classes)){
                $r = new ReflectionClass($controller_class);
                
                if($r->hasMethod($action)){    
                    $obj = $r->newInstance();
                    $method = new ReflectionMethod( $controller_class, $action );
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
                        //inicializa caso seja nulo, inovoke args não aceita null
                        $parameters = $parameters == null ? array() : $parameters;

                        $method->invokeArgs( $obj, $parameters );
                        return;
                    }
                }
            }
        }
        
        callError404();
        return;        
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