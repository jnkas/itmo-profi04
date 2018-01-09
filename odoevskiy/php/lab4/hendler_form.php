<?php

$date = $_POST['date'];
$event = $_POST['event'];
$subscribe = $_POST['subscribe'];

file_put_contents('tmpl/'.$date.'.txt', $date.' ; '.$event.' ; '.$subscribe);

header('location: admin/admin.php')
?>