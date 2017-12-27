<?php
	$curDay = $_POST['date'];
	$fileDataJson = file_get_contents('tmpl/'.$curDay.'.txt', FILE_USE_INCLUDE_PATH);
	echo $fileDataJson;
?>