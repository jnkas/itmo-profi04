<?php
	$data = $_POST;
	$fileName = $data['date'] . '.txt';
	$fileFullPath = '../tmpl/' . $fileName;
	$message = "<h1>Мероприятие добавлено</h1><h2><a href='../admin'>Добавить еще мероприятие</a></h2>";

	$imgUploadDir = '../img/';
	$eventCount = eventCount($fileFullPath);
	$imgFileName = $data['date'] . '-' . $eventCount . '.jpg';

	function eventCount($file) {
		if (file_exists($file)) {
			$fileData = file_get_contents($file, FILE_USE_INCLUDE_PATH);
			$fileDataArray = json_decode($fileData);
			$eventCount = count($fileDataArray);
			return $eventCount;
		} else {
			return 0;
		}
	}

	if (file_exists($fileFullPath)) {
		$fileData = file_get_contents($fileFullPath, FILE_USE_INCLUDE_PATH);
		$fileDataArray = json_decode($fileData);
		$data["img"] = $imgFileName;
		array_push($fileDataArray, $data);
		$preparedData = json_encode($fileDataArray);
		file_put_contents($fileFullPath, $preparedData);
		//загрузка фото
		move_uploaded_file($_FILES['imgfile']['tmp_name'], $imgUploadDir . $imgFileName);
	} else {
		$data["img"] = $imgFileName;
		$preparedData = json_encode(array($data));
		file_put_contents($fileFullPath, $preparedData);
		//загрузка фото
		move_uploaded_file($_FILES['imgfile']['tmp_name'], $imgUploadDir . $imgFileName);
	}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Админка</title>
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<link rel="stylesheet" href="../css/bootstrap.min.css" crossorigin="anonymous">
</head>
<body>
	<div class="container"><?php echo $message; ?></div>
</body>
</html>
