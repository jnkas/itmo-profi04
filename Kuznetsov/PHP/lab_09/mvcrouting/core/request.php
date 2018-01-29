<?php

class Request {
    public $input; //это get и post
    public $server;
    public $session;
    public $auth;

    function __construct() {
        $this->input = new Input(); 
        $this->server = new Server();
        $this->session = new Session();
        $this->auth = new Auth();
    }
}

/*$rq = new Request();
$rq->session->get/set();
$rq->input->get();*/

//$app = new Application();
//$app->request->input->set(xxx, 1135430);
//echo $app->request->input->get(xxx); //$_SERVER['SCRIPT_NAME']




