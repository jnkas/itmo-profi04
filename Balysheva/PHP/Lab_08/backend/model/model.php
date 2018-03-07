<?php
class Model
{
    /*Метод вывода новостей на index.php*/
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
    /*Метод удаления новости*/
    public function deleteNews() {
        $arrNewsObj = new DBWork();
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
        $arrNewsObj = new DBWork();
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
    public function checkUserProf() {
        $tempReturn = false;
        if (isset($_POST[loginName]) && isset($_POST[passName])) {
            $handlerDB = new DBWork();
            $arrUserInf = $handlerDB->arrUserInf;
            foreach ($arrUserInf as $value) {
                if ($_POST[loginName] === $value->login && $_POST[passName] === $value->password) {
                    $_SESSION["auth"] = true;
                    $_POST[loginName] = "";
                    $_POST[passName] = "";
                    $tempReturn = true;
                    break;
                }
            }
        }
        return $tempReturn;
    }
    public function logoutUser() {
        session_unset();
    }
}