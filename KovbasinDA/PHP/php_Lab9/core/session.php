<?php
/**
 * Created by PhpStorm.
 * User: diakov312
 * Date: 28.01.2018
 * Time: 15:42
 */

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