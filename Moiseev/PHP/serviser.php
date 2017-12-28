<?php 

$str = file_get_contents("tmpl/".$_POST["id"].".txt", FILE_USE_INCLUDE_PATH);
$arr = explode(";", $str);
echo json_encode($arr);
?>






