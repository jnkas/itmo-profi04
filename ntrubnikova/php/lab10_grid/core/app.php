<?php
include "autoloader.php";
include "request.php";

class App {    
    public static function run() {
        $ctr  = new Controller();
        
        // Router
        $uri = $_SERVER['REQUEST_URI'];
        $action = str_replace("/","",$uri);
        
            if (!empty($action)) {
                $route = $action;
            }
            else {
                $route = 'index';
            }
        
        $ctr->$route();
    }   
}
