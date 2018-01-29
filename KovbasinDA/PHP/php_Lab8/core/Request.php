<?php
/**
 * Created by PhpStorm.
 * User: diakov312
 * Date: 28.01.2018
 * Time: 15:33
 */

class Request
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