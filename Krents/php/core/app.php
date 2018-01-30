<?php

define('APP_PATH', realpath(dirname(__FILE__).'/..'));

require_once APP_PATH.('/core/shared/shared_functions.php');
require_once APP_PATH.('/core/models/App.php');

global $app;
$app = new \Lumisade\App();
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