<?php

class Request {
    public $input; //это get и post
    public $server;
    public $session;
    public $auth;
    //public $databaseHandler;

    function __construct() {
        $this->input = new Input(); 
        $this->server = new Server();
        $this->session = new Session();
        $this->auth = new Auth();
        //$this->databaseHandler = new DatabaseHandler();
    }
}

/*$rq = new Request();
$rq->session->get/set();
$rq->input->get();*/

//$app = new Application();
//$app->request->input->set(xxx, 1135430);
//echo $app->request->input->get(xxx); //$_SERVER['SCRIPT_NAME']




