<?php
/**
 * Created by PhpStorm.
 * User: diakov312
 * Date: 11.02.2018
 * Time: 12:15
 */

class Controller
{
    public $viewer;
    public $request;
    function __construct()
    {
        $this->viewer = new Viewer();
        $this->request = new RequestFram();
    }
}