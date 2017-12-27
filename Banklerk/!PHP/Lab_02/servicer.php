<?php
$currFile = file_get_contents("./tmpl/$_POST[id].txt",FILE_USE_INCLUDE_PATH);
$arr = explode(";", $currFile);
$resultString = "<h1>$_POST[id]</h1><h2>$arr[1]</h2><img src='./img/$_POST[id].jpg'><h3>$arr[2]</h3>";

echo json_encode($resultString);
