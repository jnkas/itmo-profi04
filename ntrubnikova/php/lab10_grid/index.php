<?php

include "core/autoloader.php";

//Get list of users
$mdl = new Model();
$result = $mdl->getData();

//Create page with table rows
$view = new View('grid.tpl');
$table = $view->dataToTable($result);
$view->renderPage($table);
