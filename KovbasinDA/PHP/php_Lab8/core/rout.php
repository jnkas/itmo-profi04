<?php

include "core/newsObj.php";
include "core/dbWork.php";
include "backend/model/model.php";
include "backend/viewer/viewer.php";

class Rout
{
    public static function Start(){
        $controllerName = "Controller";
        $actionName = "basicAction";
        $routes = explode("/" ,$_SERVER["REQUEST_URI"]);

        if (!empty($routes[1])) {
            ($routes[1] == "index.php") ? $controllerName = "Controller" : $controllerName = $routes[1];
        }

        if (!empty($routes[2])) {
            $actionName = $routes[2];
        }

        $controllerFile = strtolower($controllerName).".php";
        $controllerPath = "backend/controller/".$controllerFile;
        if (file_exists($controllerPath)) {
            include "backend/controller/".$controllerFile;
        }

        $controller = new $controllerName;
        if (method_exists($controller, $actionName)) {
            $controller->$actionName();
        }
    }
}