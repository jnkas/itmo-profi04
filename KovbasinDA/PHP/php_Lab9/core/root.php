<?php
include "autoloader.php";

class Root
{
    public static function Start(){
        session_start();
        $request = new RequestFram();
        if ($request->session->get("auth")) {
            $controllerName = "Main";
            $actionName = "index";
        } else {
            $controllerName = "Authorization";
            $actionName = "checkAuthorization";
        }

        $routes = explode("/" , $request->server->get("REQUEST_URI"));

        if (!empty($routes[1]) && ($routes[1] != "index.php")) {
            $controllerName = $routes[1];
        }

        if (!empty($routes[2])) {
            $actionName = $routes[2];
        }

        $controllerName = "Controller_".$controllerName;
        $controller = new $controllerName;

        if (method_exists($controller, $actionName)) {
            $controller->$actionName();
        } else {
            echo "Status: Not Found.";
        }
    }
}