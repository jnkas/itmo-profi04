<?php

class Session
{
    private $session;
    function __construct()
    {
        $this->session = $_SESSION;
    }
    function get($key) {
        $result = (isset($key))? $this->session[$key] : null;
        return $result;
    }
    function set($key, $value) {
        $this->session[$key] = $value;
    }
}