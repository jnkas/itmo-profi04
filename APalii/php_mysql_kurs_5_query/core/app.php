<?php
include "autoloader.php";
//include "../config.php";

class App {
   public static function run() {
   	//$controller = $_GET['controller'];
   	$action = $_POST['action'];
   	//var_dump($action);
   	$controller = 'controller';
   	//$action = 'index';
   	$ctr  = new $controller();
    $ctr->$action();
    
   }   


}
