<?php
$currDate = $_POST[id];
$currFile = file_get_contents("./template/$_POST[id].txt",FILE_USE_INCLUDE_PATH);
$arr = explode(";", $currFile);
$resultString = "<h1>$arr[1]</h1><img src='./img/$_POST[id].jpg'><p>$arr[2]</p>";

echo json_encode($resultString);
/**
 * Created by PhpStorm.
 * User: diakov312
 * Date: 19.12.2017
 * Time: 19:05
 */