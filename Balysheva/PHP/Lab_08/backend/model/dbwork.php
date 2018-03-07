<?php
include "core/config.php";
class DBWork    //Класс работы с текстовым файлом хранящим информацию новостей
{
    public $arrNews;
    public $arrUserInf;
    public $strInTXT;
    function __construct()
    {
        $this->arrNews = $this->getNewsInArr();
        $this->arrUserInf = $this->getUserInfInArr();
    }
    /*Метод формирования массива объектов NewsObj, из строк текстового файла*/
    private function getNewsInArr() {
        $currContentFileNews = file("newsDB/news.txt");
        if (count($currContentFileNews) !== 0){
            foreach ($currContentFileNews as $key=>$value) {
                $tempArr = explode(";", $value);
                $currContentFileNews[$key] = new NewsObj($tempArr[0], $tempArr[1], $tempArr[2], trim($tempArr[3]));
            }
        } else {
            $currContentFileNews = null;
        }
        return $currContentFileNews;
    }
    private function getUserInfInArr() {
        $pdo = new PDO(DSN, DB_USERNAME, DB_PASSWORD);
        $data = $pdo->query("SELECT * FROM users_profile")->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }
    /*Метод формирования строки, для записи в текстовый файл*/
    public function getNewsInString($arrNewsObj){
        $tempStr = "";
        foreach ($arrNewsObj as $key=>$value) {
            $tempStr = $tempStr.
                $value->id.";".
                $value->date.";".
                $value->header.";".
                (($key !== count($arrNewsObj)) ? $value->newsContent."\n" : $value->newsContent);
        }
        return $tempStr;
    }
}