<?php
include "./core/app.php";

App::run();



//$route = $_GET['route'];
// Роутер 
function  runController ()
{ 
    $ctr  = new Controller();
    $uri = $_SERVER[ 'REQUEST_URI' ];
    $action  =  trim( $uri ,  '/' );
    $route = $action . 'Action';
    $ctr->$route();
}

runController();






?>