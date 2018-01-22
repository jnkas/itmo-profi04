<?php
$str = 'Initialise config.txt';

$config = [
 //    "dict" => [ "ru" => "абвгдежзиклмнопрстуфхцюя",
	// 		   "en" => "abvgdejziklmnoprstufhcuj"],
	   "struct" => []
];

$dataconfig = json_encode($config);
file_put_contents('config.TXT', $dataconfig);
echo "Init comlpite";