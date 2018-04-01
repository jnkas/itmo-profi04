<?php
    header("Content-type: text/html; charset=utf-8"); //для корректного отображения русских букв.

    header('Refresh: 10; URL = index.php');
	
    $category = $_POST['category'];
    $nameCreatePage = $_POST['nameCreatePage'];
    $desc = $_POST['desc'];


   
    $openFileDefault = file_get_contents('../skell/default.php');
    
    //Разбиваем содержимое файла на массив,..
 
    $arrOpenFile = explode('<span id="putInfo"><span>', $openFileDefault);

    //Вставляем в default.php на нужное место описание, полученное из админки
    $arrOpenFile = [$arrOpenFile[0], $desc, $arrOpenFile[1]];
 
    //Сохраняем файл в папке с сответствующей категории
    $createNewFile = file_put_contents('../categories/'.$category.'/'.$nameCreatePage.'.php', $arrOpenFile);

    if($createNewFile) echo "Создан файл c названием: <b>$nameCreatePage</b> в директории <b><em>../categories/$category</em></b><br>";
    echo '<br>';
    echo '<p><a href="index.php">Вернуться в Админку</a></p>';

?>