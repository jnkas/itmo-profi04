<?php
    header("Content-type: text/html; charset=utf-8"); 
    header('Refresh: 5; URL = http://localhost/admin/index.php');

    echo '<head><meta charset="utf-8"></head><body></body>';

    $inputDate = $_POST['date']; // формат даты 2017-12-21
    $dateTime = strtotime($inputDate); 
    $inputDate = date('d.m.Y',$dateTime); // переводим в формат 12.21.2017

    $inputHeader = $_POST['header'];

    $inputDesc = $_POST['desc'];

    $msg = $inputDate.';'.$inputHeader.';'.$inputDesc;

    $file = '../tmpl/'.$inputDate.'.txt';
    
    file_put_contents($file, $msg, FILE_USE_INCLUDE_PATH);
?>