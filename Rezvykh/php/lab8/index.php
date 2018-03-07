<?php


//FrontEnd controller

// 1. Общие настройки

//debug mode
ini_set('display_errors', 1);
error_reporting(E_ALL);

// 2. Подсключение файлов системы

define('ROOTDIR', __DIR__);
define('ROOTSITE', trim($_SERVER['PHP_SELF'], 'index.php'));

require_once (ROOTDIR . '/vc4-core/router.php');

// 3. Установка соединения с БД

// 4. Вызов Router

$router = new Router();
$router->run();
