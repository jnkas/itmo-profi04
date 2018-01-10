<?php 
header('Content-Type: text/html; charset=utf-8');
$eventDate = (string)$_POST['date'];
$formattedDateTemp = new DateTime($eventDate);
$formattedDate = date_format($formattedDateTemp,"d.m.Y");

$eventTitle = (string)$_POST['title'];
$eventDescription = (string)$_POST['description'];

$toWrite = $formattedDate . ";" . $eventTitle . ";" . $eventDescription;

$file = "../tmpl/" . $formattedDate . ".txt";
file_put_contents($file, $toWrite);
?>

