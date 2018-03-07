<?php

function __autoload($className) {

    $arrayPath = array(
        '/vc4-core/',
        '/vc4-core/model/'
    );

    foreach ($arrayPath as $path) {
        $path = ROOTDIR . $path . $className . '.php';
        if (is_file($path)) {
            include_once $path;
        }
    }
}