<?php
/**
 * Created by PhpStorm.
 * User: darlane
 * Date: 1/18/18
 * Time: 8:37 PM
 */

namespace Framework;


class Server extends GlobalParams
{
    public function __construct()
    {
        parent::__construct($_SERVER);
    }
}