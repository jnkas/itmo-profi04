<?php

function view($tplName, $attributes = [])
{
    extract($attributes, EXTR_OVERWRITE);
    include_once APP_PATH.'/views/'.$tplName.'.php';
}

function redirect($url, $code = null)
{
    if ($code !== null) {
        header("Location: $url", true, $code);
    } else {
        header("Location: $url");
    }
}


