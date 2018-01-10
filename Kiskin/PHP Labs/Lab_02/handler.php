<?php

header("Content-type: text/html; charset=utf-8");
header('Refresh: 3; URL = http://localhost/admin.php');
echo '<head><meta charset="utf-8"></head><body style="font-family: arial; text-transform: uppercase; font-size: 20px;">Происходит запись на сервер.</body>';

$date = $_POST['date'];
$formDate = $date[8].$date[9].'.'.$date[5].$date[6].'.'.$date[0].$date[1].$date[2].$date[3];

$event = $_POST['header'];
$subscribe = $_POST['text'];
file_put_contents('tmpl/'.$formDate.'.txt', $formDate.'; '.$event.'; '.$subscribe);
?>