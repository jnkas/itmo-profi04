<?php


//FrontEnd controller

// 1. Общие настройки

//debug mode
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

// 2. Подключение файлов системы

define('ROOTDIR', __DIR__);
define('ROOTSITE', trim($_SERVER['PHP_SELF'], 'index.php'));

require_once (ROOTDIR . '/vc4-core/Autoloader.php');


// 4. Вызов Router

$router = new Router();
$router->run();
