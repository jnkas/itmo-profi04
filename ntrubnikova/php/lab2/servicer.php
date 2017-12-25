<?php 
header('Content-Type: text/html; charset=utf-8');
$myDate = (string)$_POST['date'];
$myPath = '/tmpl/' . $myDate . '.txt';
$info = file_get_contents($myPath,FILE_USE_INCLUDE_PATH );
$exploded =  explode(";",$info);
$keys = array("date","title","description");
$combined = array_combine($keys,$exploded);
echo json_encode($combined, JSON_UNESCAPED_UNICODE);
?>

