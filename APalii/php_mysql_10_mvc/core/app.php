<?php
include "autoloader.php";
include "/../config.php";

class App {
   public static function run() {
   	if (isset($_POST['controller']) and isset($_POST['action'])) {
   		$controller = $_POST['controller'];
   		$action = $_POST['action'];	
   	} else {
   		$controller = 'controller';
   		$action = 'getMenu';	
   	}

   	
   	//var_dump($action);
   	//echo $controller;
   	$ctr  = new $controller();
    $ctr->$action();
	    
   }   


}

