<?php

    $file = file_get_contents('./tmpl/'.$_POST["id"].'.txt',FILE_USE_INCLUDE_PATH );

    $arrTextOfFile = explode(";", $file);

    echo json_encode(array("date" => $arrTextOfFile[0], "header" => $arrTextOfFile[1], "desc" => $arrTextOfFile[2]));

?>