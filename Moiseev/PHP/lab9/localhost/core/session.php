<?php

class Session {
    private $session;

    function __construct() {
        $this->session = $_SESSION;
    }

    function get($key) {
        //проверка установлен ли ключ isset() ? null;
        $result = (isset($key))? $this->session[$key] : null;
        return $result;
    }

    function set($key, $value) {
        $this->session[$key] = $value;
    } 
}