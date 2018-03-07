<?php

class request
{
    public $input;
    public $server;
    public $session;
    function __construct()
    {
        $this->input = new Input();
        $this->server = new Server();
        $this->session = new Session();
    }
}