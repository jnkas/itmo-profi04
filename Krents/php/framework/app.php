<?php

define('APP_PATH', realpath(dirname(__FILE__).'/..'));

require_once __DIR__.('/models/App.php');

global $app;
$app = new \Framework\App();
function app()
{
    global $app;
    return $app;
}

/**
 * @param $tplName
 * @param array $attributes
 */
function view($tplName, $attributes = [])
{
    app()->view->render($tplName, $attributes);
}


return app()->run();