<?php
//создание и очистка базы данных
$config = [
	"category" => [],
	"lastCatId" => [0],
	"lastPageId" => [0],
	"pages" => [],
	"pageInCat" => []

];
$dataJson = json_encode($config);

array_map('unlink', glob("category/*"));

file_put_contents('config.php', $dataJson);
echo "Настройки переинициализированны";