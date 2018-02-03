<?php 
$result = "<script type='text/javascript' src='asset/js/action.js'></script>";
$result .= "<textarea id='file_content' class='form-control' type='text' name='file_content'  required>". $data["content"] ."</textarea><br>";
$result .= "<button id='editBTN2' class='btn btn-primary' name='edituploadActionHelper' value=".$data["id"].">Save Page </button>";
echo $result;




?>