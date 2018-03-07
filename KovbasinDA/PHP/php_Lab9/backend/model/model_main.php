<?php

class Model_Main extends Model
{

    /*Метод добавления новости*/
    public function addNews() {
        $arrNewsObj = new DBTXTHandler();
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

    /*Метод удаления новости*/
    public function deleteNews() {
        $arrNewsObj = new DBTXTHandler();
        $arrNews = $arrNewsObj->arrNews;
        foreach ($arrNews as $key=>$value){
            if ($value->id == $_GET[idNews]){
                unset($arrNews[$key]);
                break;
            }
            sort($arrNews);
        }

        $tempStrArr = $arrNewsObj->getNewsInString($arrNews);

        /*Выполняем запись в файл данных из $tempStrArr*/
        $fDB = fopen("newsDB/news.txt", "w+");
        fwrite($fDB, $tempStrArr);
        fclose($fDB);
        return $arrNews;
    }

    /*Метод редактирования новости*/
    public function editNews() {
        $arrNewsObj = new DBTXTHandler();
        $arrNews = $arrNewsObj->arrNews;
        foreach ($arrNews as $key=>$value) {
            if ($_POST[idNews] == $value->id) {
                $value->header = $_POST[nameHeadNews];
                $value->newsContent = $_POST[nameNewsContent];
            }
        }

        $tempStrArr = $arrNewsObj->getNewsInString($arrNews);
        $fDB = fopen("newsDB/news.txt", "w+");
        fwrite($fDB, $tempStrArr);
        fclose($fDB);
        return $arrNews;
    }
}