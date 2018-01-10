<?php

$currDate = date('d.m.Y', strtotime($_POST['date'])); 
$header = $_POST["header"];
$desc = $_POST["desc"];
$img = "img/" . $currDate . ".jpg";

$str = $currDate.";".$header.";".$desc.";img/".$img;

?>