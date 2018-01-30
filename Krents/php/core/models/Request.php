<?php
/**
 * Created by PhpStorm.
 * User: darlane
 * Date: 1/18/18
 * Time: 8:37 PM
 */

namespace Lumisade\Models;

/**
 * Class Request
 * @package Framework
 */
class Request
{
    /** @var Session */
    public $session;

    /** @var Server */
    public $server;

    /** @var Input */
    public $input;

    /**
     * Request constructor.
     */
    public function __construct()
    {
        $this->server  = new Server();
        $this->session = new Session();
        $this->input   = new Input();
    }

    /**
     * Get user remote ip
     * @return null
     */
    public function getClientIp()
    {
        return $this->server->get('REMOTE_ADDR');
    }

    /**
     * Get current URL
     * @return null
     */
    public function getUrl()
    {
        return $this->server->get('REQUEST_URI');
    }
    /**
     * Get http method
     * @return null
     */
    public function getHttpMethod()
    {
        return $this->server->get('REQUEST_METHOD');
    }

    /**
     * Check http method
     * @param $method
     * @return bool
     */
    public function isMethod($method)
    {
        return strtolower($this->server->get('REQUEST_METHOD')) === $method;
    }
}