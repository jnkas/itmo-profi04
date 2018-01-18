<?php
/**
 * Created by PhpStorm.
 * User: darlane
 * Date: 1/18/18
 * Time: 9:13 PM
 */

namespace Framework;


class App
{
    public $request;
    public $logger;
    public $response;


    public function __construct()
    {

    }


    public function run()
    {
        session_start();
        require_once __DIR__.('/Autoloader.php');
        \Autoloader::registerClasses(APP_PATH, true);

        $this->request = new Request();
        return $this->handleUrl();
    }

    public function handleUrl()
    {

        $url = explode('?', $_SERVER['REQUEST_URI'], 2)[0];
        if (($routeData = Router::checkRouteExist($url, $_SERVER['REQUEST_METHOD'])) !== null) {
            $route = is_array($routeData) ? $routeData['route'] : $routeData;
            list($controller, $action) = explode('@', $route);
            $controllerClass = new $controller();

            return is_array($routeData) && isset($routeData['param']) ?
                $controllerClass->$action($routeData['param'], array_merge($_POST, $_GET, ['files' => $_FILES])) :
                $controllerClass->$action(array_merge($_POST, $_GET, ['files' => $_FILES]));
        }

        echo '<h1>404</h1>';
        return http_response_code(404);
    }
}