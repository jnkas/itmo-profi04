<?php
include "autoloader.php";
include "../config.php";

class App {
   public static function run() {
   	$controller = $_GET['controller'];
   	$action = $_GET['action'];
   	var_dump($action);

   	$ctr  = new $controller();
    $ctr->$action();
    
   }   


}
