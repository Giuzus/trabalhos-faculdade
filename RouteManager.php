<?php

class RouteManager
{
    static function getCurrentUri()
    {
        $uri = substr($_SERVER['REQUEST_URI'], strlen(BASE_PATH));
        if (strstr($uri, '?')) {
            $uri = substr($uri, 0, strpos($uri, '?'));
        }

        $uri = trim($uri, '/');
        return $uri;
    }

    static function getQueryString()
    {
        if (isset($_SERVER['REDIRECT_QUERY_STRING'])) {
            return $_SERVER['REDIRECT_QUERY_STRING'];
        }

        return null;
    }

    static function callError404()
    {
        RouteManager::callAction('pages', 'error404');
    }

    static function redirectTo($controller, $action, $parameters = "")
    {
        $base = BASE_PATH;
        $url =  $base . $controller ."/". $action . $parameters;

        header("LOCATION: $url");
    }

    static function callAction($controller, $action, $parameters = null)
    {

        $filename = 'controllers/' . $controller . '_controller.php';
        
        if (file_exists( $filename )) {
            require_once($filename);

            $existing_classes = get_declared_classes();
            $controller_class = ucwords($controller) . 'Controller';
            
            if (in_array($controller_class, $existing_classes)) {
                $r = new ReflectionClass($controller_class);
                
                if ($r->hasMethod($action)) {
                    $obj = $r->newInstance();
                    $method = new ReflectionMethod( $controller_class, $action );
                    $method_parameters = $method->getParameters();
                
                    $valid = true;

                    foreach ($method_parameters as $m_param) {
                        if (!(isset($parameters[$m_param->getName()]) || $m_param->isOptional())) {
                            $valid = false;
                            break;
                        }
                    }

                    if ($valid) {
                        //inicializa caso seja nulo, inovoke args não aceita null
                        $parameters = $parameters == null ? array() : $parameters;

                        $method->invokeArgs( $obj, $parameters );
                        return;
                    }
                }
            }
        }
        
        RouteManager::callError404();
        return;
    }
}
