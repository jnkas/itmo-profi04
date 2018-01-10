<?php
/**
 * Created by PhpStorm.
 * User: darlane
 * Date: 12/19/17
 * Time: 8:00 PM
 */

namespace Framework;


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

    public static function checkRouteExist($url)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            return self::$routesPost[$url];
        }
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            return self::$routesGet[$url];
        }
        return null;
    }
}