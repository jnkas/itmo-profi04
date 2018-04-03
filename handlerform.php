<?php
$date=$_POST['dt'];//передаем на сервер дату//
$text=$_POST['header'];//передаем на сервер заголовок//
int file_put_contents (string $date,$text); //собираем в один файл дату и заголовок//
?>