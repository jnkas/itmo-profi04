<?php

    header("Content-type: text/html; charset=utf-8"); //для корректного отображения русских букв.

    header('Refresh: 5; URL = http://localhost/admin/admin.php');
    echo '<head><meta charset="utf-8"></head><body style="padding-top: 100px;font-size: 20px;">Данные для календаря направлены на сервер. Через 5 секунд Вы вернетесь на страницу admin.php</body>';

    $inputDate = $_POST['date']; // 2017-12-21
    $dateTime = strtotime($inputDate); 
    $inputDate = date('d.m.Y',$dateTime); // 21.12.2017

    $inputHeader = $_POST['header'];

    $inputDesc = $_POST['desc'];

    $msg = $inputDate.';'.$inputHeader.';'.$inputDesc;

    $file = '../tmpl/'.$inputDate.'.txt';
    
    file_put_contents($file, $msg, FILE_USE_INCLUDE_PATH); //запись в файл

?>