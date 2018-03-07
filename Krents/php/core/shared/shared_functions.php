<?php

function env($key, $default = null)
{
    $env = getenv($key);
    return $env ?: $default;
}