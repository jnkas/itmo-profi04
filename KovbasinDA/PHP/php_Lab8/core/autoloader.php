<?php

spl_autoload_register(function ($className){
    $directories = [
        'core/',
        'backend/viewer/',
        'backend/model/',
        'backend/controller/',
    ];

    foreach ($directories as $directory) {
        if (file_exists($directory.strtolower($className).".php")) {
            require_once ($directory.strtolower($className).".php");
            return;
        } else {
            echo "Класс ".$className." не найден.<br>";
        }
    }
});