<?php
define('APP_PATH', realpath(dirname(__FILE__).'/..'));
registerClasses(APP_PATH, true);
session_start();
function registerClasses($directory, $first = false)
{
    $dirs = array_filter(glob($directory.'/*'), 'is_dir');
    foreach ($dirs as $dir) {
        if ($dir === APP_PATH.'/views' || $dir === APP_PATH.'/public') {
            continue;
        }
        $classes = glob($dir.'/*.php');
        foreach ($classes as $class) {
            if ($dir.'/framework/app.php' !== $class) {
                require_once $class;
            }
        }
        if (count(array_filter(glob($dir.'/*'), 'is_dir')) > 0) {
            registerClasses($dir);
        }
    }
}

$url = $_SERVER['REQUEST_URI'];
if (substr($url, -1, 1) === '/' && substr($url, -2, 1) !== '\\') {
    $url = substr($url, 0, -1);
}

$url = explode('?', $_SERVER['REQUEST_URI'], 2)[0];

if (($routeData = \Framework\Router::checkRouteExist($url, $_SERVER['REQUEST_METHOD'])) !== null) {
    $route = is_array($routeData) ? $routeData['route'] : $routeData;
    list($controller, $action) = explode('@', $route);
    $controllerClass = new $controller();

    echo is_array($routeData) && isset($routeData['param']) ?
        $controllerClass->$action($routeData['param'], array_merge($_POST, $_GET, ['files' => $_FILES])) :
        $controllerClass->$action(array_merge($_POST, $_GET, ['files' => $_FILES]));
    return;
}
echo '<h1>404</h1>';
return http_response_code(404);