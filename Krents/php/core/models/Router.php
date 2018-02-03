<?php
/**
 * Created by PhpStorm.
 * User: darlane
 * Date: 12/19/17
 * Time: 8:00 PM
 */

namespace Lumisade\Models;


class Router
{
    private static $routesGet = [];
    private static $routesPost = [];

    public static function get($url, $action)
    {
        self::$routesGet[$url] = $action;
    }

    public static function post($url, $action)
    {
        self::$routesPost[$url] = $action;
    }

    public static function all($url, $action)
    {
        self::$routesPost[$url] = $action;
        self::$routesGet[$url]  = $action;
    }

    public static function checkRouteExist($url, $method)
    {
        $routes = [];
        if ($method === 'POST') {
            $routes = self::$routesPost;
        }
        if ($method === 'GET') {
            $routes = self::$routesGet;
        }

        foreach ($routes as $key => $route) {
            if (preg_match('/\{.*\}/', $key, $matches) !== 0) {
                $method     = str_replace($matches[0], '', $key);
                $paramValue = str_replace($method, '', $url);
                if ($method.$paramValue === $url) {
                    return [
                        'route' => $route,
                        'param' => $paramValue
                    ];
                }
            } elseif ($key === $url) {
                return $route;
            }
        }
        return null;
    }
}