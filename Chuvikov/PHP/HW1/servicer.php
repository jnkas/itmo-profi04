<?php
$file = file_get_contents('tmpl/'.$_POST["id"].'.txt',FILE_USE_INCLUDE_PATH);
$arr = explode(";",$file);

echo json_encode(array("dat"=>$arr[0], "event"=>$arr[1], "preview"=>$arr[2]));
?>