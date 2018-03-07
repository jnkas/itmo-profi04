<?php

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