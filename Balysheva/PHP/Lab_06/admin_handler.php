<?php

//получаем значения введенные в админке
$category = $_POST['category_list'];
$page_name = $_POST['page_name'];
$page_filler = $_POST['page_filler'];

//создаем полное имя файла
$file_name = $page_name . '.php';

//проверяет есть ли такая папка
if(!file_exists($category)) {
    mkdir($category);
    echo "Создана папка c названием: $category<br>";
}

//логика обработчика
$def_path = './tmplt/default.php';
$final_path = $category . '/' . $file_name;

//file_get_contents
$inp_str = file_get_contents($def_path);
$buf_str = sprintf($inp_str, $page_filler);
$ou_str = file_put_contents($final_path, $buf_str);

if($ou_str) echo "Создан файл c названием: $final_path<br>";
echo '<a href="admin.php">Админка</a>';




//отладчик
/*echo '<pre>', 
var_export($final_path), '<br>', 
var_export($buf_str), '<br>', 
var_export($ou_str), '<br>', 
'</pre>';*/


?>