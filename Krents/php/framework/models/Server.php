<?php
/**
 * Created by PhpStorm.
 * User: darlane
 * Date: 1/18/18
 * Time: 8:37 PM
 */

namespace Framework;

/**
 * Class Server
 * @package Framework
 */
class Server extends GlobalParams
{
    /**
     * Server constructor.
     */
    public function __construct()
    {
        parent::__construct($_SERVER);
    }

}