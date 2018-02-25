<?php

class Model
{
    public $request;

    function __construct()
    {
        $this->request = new RequestFram();
    }

    /*Метод вывода новостей на index.php*/
    public function basicAction() {
        $arrNewsObj = new DBTXTHandler();
        $arrNews = $arrNewsObj->arrNews;
        return $arrNews;
    }
}