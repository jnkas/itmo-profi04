<?php

spl_autoload_register(function ($class_name) {
    $class_name = strtolower($class_name);
	$directories = [
        'backend/view/',
        'backend/model/',
        'backend/controller/',           
        'core/',           
        ];
    foreach($directories as $directory) {
        if(file_exists($directory.$class_name . '.php')) {
            //echo $directory.$class_name . '.php';
            //echo "</br>";
            require_once($directory.$class_name . '.php');
            //return;
        } else {
            //echo "Класс ".$class_name ." не найден.";
        }          
    }
});