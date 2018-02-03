<?php

class Input {
    private $input;

    function __construct() {
        $this->input = array_merge($_GET, $_POST);
    }

    function get($key) {
        //проверка установлен ли ключ isset() ? null;
        $result = (isset($key))? $this->input[$key] : null;
        return $result;
    }

    function set($key, $value) {
        $this->input[$key] = $value;
    }
}