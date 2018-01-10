<?php

/* первый способ 
echo file_get_contents('tmpl/'.$_POST["id"].".txt", FILE_USE_INCLUDE_PATH);
*/
/* второй способ */


$file_src = 'tmpl/'.$_POST['id'].'.txt';
$file_str = file_get_contents($file_src, FILE_USE_INCLUDE_PATH);
$file_str_arr = explode(';', $file_str);
$now_day = $_POST['day'];
$months_arr = [
    1=>'Января',
    'Февраля',
    'Марта',
    'Апреля',
    'Мая',
    'Июня',
    'Июля',
    'Августа',
    'Сентября',
    'Октября',
    'Ноября',
    'Декабря'];

$now_month = $months_arr[$_POST['month']];

$output_str = '<h1>Сегодня: ' . $now_day . ' ' . $now_month . '</h1><h2>' . $file_str_arr[1] . '</h2><img src=' . $file_str_arr[3] . '><p>' . $file_str_arr[2] . '</p>';
echo json_encode($output_str);



?>
