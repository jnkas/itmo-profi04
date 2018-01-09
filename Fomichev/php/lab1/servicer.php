
<?php
$content = file_get_contents('tmpl/'.date('d.m.o').'.txt'); //находим файл по текущей дате и сохраняем его в переменную.
$slice = explode(";", $content); // разбиваем строку по разделтелю
$event = $slice[1];
$subscribe = $slice[2];
$obj = array('date' => date('d.m.o'), 'event' => $event, 'subscribe' => $subscribe);
echo json_encode($obj);
?>




    
