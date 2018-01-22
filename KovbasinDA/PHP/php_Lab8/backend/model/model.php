<?php

class Model
{

    public function basicAction() {
        $arrNewsObj = new DBWork();
        $arrNews = $arrNewsObj->arrNews;
        return $arrNews;
    }

    /*Метод добавления новости*/
    public function addNews() {
        $arrNewsObj = new DBWork();
        $arrNews = $arrNewsObj->arrNews;
        $lastId = count($arrNews);   //Получаем количиство строк в файле(номер последнего элемента + 1)

        $arrNews[$lastId] = new NewsObj(($arrNews[$lastId-1]->id)+1, "CurrDate", $_POST[nameHeadNews], $_POST[nameNewsContent]);


        $tempStrArr = $arrNewsObj->getNewsInString($arrNews);

        /*Выполняем запись в файл данных из $tempStrArr*/
        $fDB = fopen("newsDB/news.txt", "w+");
        fwrite($fDB, $tempStrArr);
        fclose($fDB);
        return $arrNews;
    }

    public function deletePage() {

    }

    public function editPage() {

    }

    public function getAllNews() {

    }
}