<?php
/**
 * Created by PhpStorm.
 * User: darlane
 * Date: 1/18/18
 * Time: 8:37 PM
 */

namespace Framework;


class Request
{
    public $session;
    public $server;
    public $input;

    public function __construct()
    {
        $this->server  = new Server();
        $this->session = new Session();
        $this->input   = new Input();
    }


    public function getClientIp()
    {
        return $this->server->get('REMOTE_ADDR');
    }
}