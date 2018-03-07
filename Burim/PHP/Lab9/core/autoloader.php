<?php
spl_autoload_register(function ($className){
    $classMesg = "Класс ".$className." не найден.<br>";
    $directories = [
        'core/',
        'backend/viewer/',
        'backend/model/',
        'backend/controller/',
    ];
    foreach ($directories as $directory) {
        if (file_exists($directory.strtolower($className).".php")) {
            require_once ($directory.strtolower($className).".php");
            $classMesg = "";
            return;
        }
    }
    echo $classMesg;
});