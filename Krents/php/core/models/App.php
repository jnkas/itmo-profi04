<?php
/**
 * Created by PhpStorm.
 * User: darlane
 * Date: 1/18/18
 * Time: 9:13 PM
 */

namespace Lumisade;

use Lumisade\Models\Auth;
use Lumisade\Models\ErrorHandler;
use Lumisade\Models\Request;
use Lumisade\Models\View;
use Lumisade\Models\Router;

class App
{
    /** @var  Request|null */
    public $request;
    public $logger;
    public $response;

    /** @var  Auth */
    public $auth;

    /** @var  \DatabaseHandler */
    public $DB;

    /** @var  View|null */
    public $view;


    public function __construct()
    {

    }


    public function run()
    {
        require_once __DIR__.('/Autoloader.php');
        \Autoloader::registerClasses(APP_PATH, true);
        $this->registerEnvironments();
        $this->registerSessionConfig();
        $this->request = new Request();
        $this->view    = new View();
        $this->auth    = new Auth();
        $this->DB      = \DatabaseHandler::class;
        return $this->handleUrl();
    }

    public function config($name)
    {
        return require APP_PATH.'/configs/'.$name.'.php';
    }

    public function handleUrl()
    {
        set_error_handler([new ErrorHandler(), 'handle']);
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

    private function registerSessionConfig()
    {
        $config = $this->config('session');
        if ($config['type'] === 'files') {
            session_save_path($config['path']);
        }
        if ($config['type'] === 'redis') {
            ini_set('session.save_handler', 'redis');
            session_save_path('tcp://'.$config['redis']['host'].':'.$config['redis']['port'].'?auth='.$config['redis']['password']);
        }
        session_start();
    }

    private function registerEnvironments()
    {
        if ($envFile = file_get_contents(APP_PATH.'/.env')) {
            $environments = explode("\n", $envFile);
            foreach ($environments as $environment) {
                $env = trim($environment);
                if ($env !== '' && $env[0] !== '#') {
                    putenv($env);
                }
            }
        }
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