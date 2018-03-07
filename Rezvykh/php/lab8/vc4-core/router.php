<?php

class Router
{
    private $routes;

    public function __construct() {
        $routesPath = ROOTDIR . '/vc4-config/routes.php';
        $this->routes = include($routesPath);
    }

    /**
     * @return string
     * возвращаем Uri
     * если движок не в корне сайта откидываем лишнее чтобы корректно подключать контроллеры
     */

    private function getUri() {

        if(!empty($_SERVER['REQUEST_URI'])) {
            $uri = substr($_SERVER['REQUEST_URI'], strlen(ROOTSITE));
            return $uri;
        }
    }

    public function run() {

        //Получаем строку запроса
        $uri = $this->getUri();

        //Проверка наличия запроса в routes.php
        foreach ($this->routes as $uriPattern => $path) {

            //Сравниваем $uriPattern и $uri
            if (preg_match("~$uriPattern~", $uri)) {

                // определяем какой контроллер и экшн обрабатывает запрос

                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                $segments = explode('/', $internalRoute);

                $controllerName = array_shift($segments) . 'Controller';
                $controllerName = ucfirst($controllerName);

                $actionName = 'action' . ucfirst(array_shift($segments));

                $parameters = $segments;

                //Подключаем файл класса-контроллера
                $controllerFile = ROOTDIR . '/vc4-core/controller/' . $controllerName . '.php';

                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }

                //Создаем объект и вызываем метод
                $controllerObject = new $controllerName;

                $result = $controllerObject->$actionName($parameters);


                if ($result != null) {
                    break;
                }
            }
        }
    }
}