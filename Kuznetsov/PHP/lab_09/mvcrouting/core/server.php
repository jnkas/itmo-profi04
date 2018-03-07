<?php

class Server {
    private $server;

    function __construct() {
        $this->server = $_SERVER;
    }

    function get($key) {
        //проверка установлен ли ключ isset() ? null;
        $result = (isset($key))? $this->server[$key] : null;
        return $result;
    }

    function set($key, $value) {
        $this->server[$key] = $value;
    }
}