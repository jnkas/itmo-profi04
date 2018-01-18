<?php
/**
 * Created by PhpStorm.
 * User: darlane
 * Date: 1/18/18
 * Time: 8:41 PM
 */

namespace Framework;


class Input extends GlobalParams
{
    public function __construct()
    {
        $data = array_merge($_GET, $_POST);
        unset($data['q']);
        parent::__construct($data);
    }

}