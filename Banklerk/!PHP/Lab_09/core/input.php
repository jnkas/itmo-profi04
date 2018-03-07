<?php
/**
 * Created by PhpStorm.
 * User: diakov312
 * Date: 28.01.2018
 * Time: 15:37
 */

class Input
{
    private $input;

    function __construct()
    {
        $this->input = array_merge($_GET, $_POST);
    }

    function get($key) {
        $result = (isset($key)) ? $this->input[$key] : false;
        return $result;
    }

    function set($key, $value) {
        $this->input[$key] = $value;
    }
}