<?php
class NewsObj   //Класс описывающий объект массива новостей
{
    public $id;
    public $date;
    public $header;
    public $newsContent;
    function __construct($id, $date, $header, $newsContent)
    {
        $this->id = $id;
        $this->date = $date;
        $this->header = $header;
        $this->newsContent = $newsContent;
    }
}