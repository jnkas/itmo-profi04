<?php
    header("Content-type: text/html; charset=utf-8"); //для корректного отображения русских букв.

    header('Refresh: 10; URL = index.php');
	
    $category = $_POST['category'];
    $nameCreatePage = $_POST['nameCreatePage'];
    $desc = $_POST['desc'];


/*
#тестируем..
    echo $category;
    echo "<br><br>";
    echo $nameCreatePage;
    echo "<br><br>";
    echo $desc;
    echo "<br><br>";
*/

    //Если папка с именем категории еще не создана, создаем папку.
   if(!file_exists('../categories/'.$category)) {
        @mkdir('../categories/'.$category);
        echo "Папки с именем категории <b><em>$category</b></em> ранее не существовало<br>";
        echo "Поэтому создана папка: ../categories/$category<br>";
    } else {
        echo "<br>Cоздание папки с именем категории <b>$category</b> не требуется, т.к. папка уже создана.<br><br>";
    }

    //Получаем файл default.php
    $openFileDefault = file_get_contents('../skell/default.php');
    
    //Разбиваем содержимое файла на массив,..
    //..чтобы вставить полученное описание $desc в нужное место на странице
    $arrOpenFile = explode('<span id="putInfo"><span>', $openFileDefault);

    //Вставляем в default.php на нужное место описание, полученное из админки
    $arrOpenFile = [$arrOpenFile[0], $desc, $arrOpenFile[1]];
 
    //Сохраняем файл в папке с сответствующей категории
    $createNewFile = file_put_contents('../categories/'.$category.'/'.$nameCreatePage.'.php', $arrOpenFile);

    if($createNewFile) echo "Создан файл c названием: <b>$nameCreatePage</b> в директории <b><em>../categories/$category</em></b><br>";
    echo '<br>';
    echo '<br>';
    echo '<br>';
    echo '<br>';
	echo '<p>Через 10 секунд Вы вернетесь в Админку..</p>';
	echo '<br>';
    echo '<p>Если не хотите ждать 10 секунд - нажмите сюда: <a href="index.php">Вернуться в Админку.. =>></a></p>';

?>