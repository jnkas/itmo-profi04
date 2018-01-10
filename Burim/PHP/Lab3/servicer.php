<?php
$currDate = $_POST[id];
$fileDate=
file_get_contents("./template/$_POST[id].txt",FILE_USE_INCLUDE_PATH);
$arr=explode(";", $fileDate);
$resultString = "<h1>$arr[1]</h1><img src='./img/$_POST[id].jpg'><p>$arr[2]</p>";
echo json_encode($resultString);
?>


