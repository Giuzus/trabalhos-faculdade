<?php

require_once('RouteManager.php');

define("LANDING_CONTROLLER", "pages");
define("LANDING_ACTION", "home");


define("DEFAULT_ACTION", "index");
define("CONTROLLER_INDEX", 0);
define("ACTION_INDEX", 1);

$basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
define("BASE_PATH", $basepath);



$base_url = RouteManager::getCurrentUri();

$routes = explode('/', $base_url);

$controller = LANDING_CONTROLLER;
$action     = LANDING_ACTION;

$queryString = RouteManager::getQueryString();
parse_str($queryString, $parameters);

if (isset($routes[CONTROLLER_INDEX]) && $routes[CONTROLLER_INDEX] != null) {
    $controller = $routes[CONTROLLER_INDEX];
    if (isset($routes[ACTION_INDEX]) && $routes[ACTION_INDEX] != null) {
        $action = $routes[ACTION_INDEX];
    } else {
        $action = DEFAULT_ACTION;
    }
}

RouteManager::callAction($controller, $action, $parameters);
