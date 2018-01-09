<?php
$currFile = file_get_contents("./template/$_POST[id].txt",FILE_USE_INCLUDE_PATH);
$arr = explode(";", $currFile);
$resultString = "<h1>$_POST[id]</h1><h3>$arr[1]</h3><img src='./img/$_POST[id].jpg'><p>$arr[2]</p>";

$contentDirTemplate = scandir('./template');

echo json_encode($resultString);
