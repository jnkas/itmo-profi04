<?php

$curr_date = date('d.m.Y', strtotime($_POST['date']));
$file = 'tplt/' . $curr_date . '.txt';
$header = $_POST['header'];
$desc = $_POST['desc'];
$img = 'img/' . $curr_date . '.jpg';
$str = $curr_date . ';' . $header . ';' . $desc . ';' . $img;
$writing = file_put_contents($file, $str, FILE_USE_INCLUDE_PATH);
if($writing) {
    echo 'Успешно записана следующая информация: ' . $str . ' - в файл: ' . 'tplt/' . $curr_date . '.txt<br><a href="admin.php">Вернуться к форме</a>';
} else {
    echo 'Что-то пошло не так!';
};
?>