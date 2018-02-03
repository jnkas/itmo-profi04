<?php
/**
 * Created by PhpStorm.
 * User: diakov312
 * Date: 28.01.2018
 * Time: 15:44
 */

class Server {
    private $server;

    function __construct() {
        $this->server = $_SERVER;
    }

    function get($key) {
        $result = (isset($key))? $this->server[$key] : null;
        return $result;
    }

    function set($key, $value) {
        $this->server[$key] = $value;
    }
}