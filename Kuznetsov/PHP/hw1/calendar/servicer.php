<?php

/* первый способ 
echo file_get_contents('tmpl/'.$_POST["id"].".txt", FILE_USE_INCLUDE_PATH);
*/
/* второй способ */
$file_src = 'tmpl/'.$_POST['id'].'.txt';
$str = file_get_contents($file_src, FILE_USE_INCLUDE_PATH);
$arr = explode(';', $str);
$output_str = "<h1>" . $arr[0] . "</h1>" . "<h2>" . $arr[1] . "</h2>" . "<img src=" . $arr[3] . ">" . "<p>" . $arr[2] . "</p>";
echo json_encode($output_str);


?>
