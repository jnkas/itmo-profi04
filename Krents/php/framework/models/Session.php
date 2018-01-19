<?php
/**
 * Created by PhpStorm.
 * User: darlane
 * Date: 1/18/18
 * Time: 8:41 PM
 */

namespace Framework;


class Session extends GlobalParams
{

    public function __construct()
    {
        parent::__construct($_SESSION);
    }


    /**
     * Remove value by key
     * @param $key
     */
    public function remove($key)
    {
        unset($this->storage[$key]);
        unset($_SESSION[$key]);
    }

}