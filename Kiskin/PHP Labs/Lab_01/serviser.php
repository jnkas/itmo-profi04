<?php
$file = file_get_contents('./tmpl/'.$_POST["id"].'.txt',FILE_USE_INCLUDE_PATH );
$arrTextOfFile = explode(";", $file);
echo json_encode(array("date" => $arrTextOfFile[0], "desc" => $arrTextOfFile[1], "header" => $arrTextOfFile[2]));
?>