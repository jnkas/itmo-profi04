<?php
if ($_POST[dateEvent] == null) {
    header("Location: index.php");
    exit();
}

function transformDate($currDate) {
    $temp = explode("-", $currDate);
    return $temp[2].".".$temp[1].".".$temp[0];
}

$formatDate = transformDate($_POST[dateEvent]);
$fp = fopen("..\\template\\$formatDate.txt", 'w+');
fwrite($fp, "$formatDate".";"."$_POST[headEvent]".";"."$_POST[descriptionEvent]");
fclose($fp);
header("Location: index.php");