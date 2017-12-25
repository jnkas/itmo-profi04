<?php
$file = file_get_contents('./tplt/$_POST[id].txt',FILE_USE_INCLUDE_PATH);
$arr = explode(";",$file);
$exit = "<h1>$_POST[id]</h1><h3>$arr[1]</h3><img src='./img/$_POST[id].jpg'><p>$arr[2]</p>";
echo json_encode($exit);

?>