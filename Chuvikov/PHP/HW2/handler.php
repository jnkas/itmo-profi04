<?php
$calendar = $_POST['calendar'];
$name = $_POST['name'];
$message = $_POST['message'];

file_put_contents ('tmpl/'.$calendar.'.txt', $calendar.' ; '.$name.' ; '.$message);


?>