<?php
$date = $_POST['date'];
$str = file_get_contents('./tplt/' . $date . '.txt');
$temp = explode(";", $str);
echo json_encode($temp);
 
?>