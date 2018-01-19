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
    /** @var  Request|null */
    public $request;
    public $logger;
    public $response;

    /** @var  View|null */
    public $view;


    public function __construct()
    {

    }


    public function run()
    {
        session_start();
        require_once __DIR__.('/Autoloader.php');
        \Autoloader::registerClasses(APP_PATH, true);

        $this->request = new Request();
        $this->view    = new View();
        return $this->handleUrl();
    }

    public function config($name)
    {
        return require APP_PATH.'/configs/'.$name.'.php';
    }

    public function handleUrl()
    {
        $url = explode('?', $this->request->getUrl(), 2)[0];
        if (($routeData = Router::checkRouteExist($url, $this->request->getHttpMethod())) !== null) {
            $route = is_array($routeData) ? $routeData['route'] : $routeData;
            list($controller, $action) = explode('@', $route);
            $controllerClass = new $controller();
            if (method_exists($controllerClass, 'handle')) {
                $controllerClass->handle();
            }
            return is_array($routeData) && isset($routeData['param']) ?
                $controllerClass->$action($routeData['param'], $this->request->input) :
                $controllerClass->$action($this->request->input);
        }

        echo '<h1>404</h1>';
        return http_response_code(404);
    }


    public function redirect($url, $code = null)
    {
        if ($code !== null) {
            header("Location: $url", true, $code);
        } else {
            header("Location: $url");
        }
    }
}