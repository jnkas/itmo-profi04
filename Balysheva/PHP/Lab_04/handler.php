<?php

/* формат даты вручную
$date = $_POST["date"];
$arr = explode("-", $date);
$curr_date = $arr[2].".".$arr[1].".".$arr[0];
*/

// формат даты через функцию, от ДК
$curr_date = date('d.m.Y', strtotime($_POST['date']));
$file = 'tmpl/' . $curr_date . '.txt';
$header = $_POST['header'];
$desc = $_POST['desc'];
$img = 'img/' . $curr_date . '.jpg';

// первый способ, сохраняем строкой
$str = $curr_date . ';' . $header . ';' . $desc . ';' . $img;

/*
второй способ, сохраняем в json формате
$arr1 = [
    'date' => $curr_date, 
    'header' => $header,
    'desc' => $desc,
    'img' => $img
    ];
$str = json_encode($arr1);
*/

$writing = file_put_contents($file, $str, FILE_USE_INCLUDE_PATH);

if($writing) {
    echo 'Успешно записана следующая информация: ' . $str . ' - в файл: ' . 'tmpl/' . $curr_date . '.txt<br><a href="admin/index.php">Вернуться в админку</a>';
} else {
    echo 'Что-то пошло не так!';
};

/*
echo "<pre>";
    print_r($curr_date.";".$header.";".$desc.";"."img/".$curr_date.".jpg");
echo "</pre>";
*/

?>
