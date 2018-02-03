<?php

include './core/autoloader.php';
include './core/helper.php';

class App {
    public $request;
    public $logger;
    public $response;

    function __construct() {
        $this->request = new Request();
    }
    
    public static function run() {
        $ctr  = new Controller();
        $url = $_SERVER['REQUEST_URI'];
        $action  = basename($url);
        $action  =  trim($action , '/');
        if(strcasecmp($action, 'mvcrouting') === 0) {
            $route = 'indexAction';
            $ctr->$route();
        } else {
            $data_arr = explode('?',$action);
            $route = $data_arr[0] . 'Action';
            $ctr->$route($data_arr[1]);
        }
    }    
}









