<?php
$date = $_POST['date'];

//function formatDate() {
//
//    $dd = date.getDate();
//    $mm = date.getMonth() + 1;
//    $yyyy = date.getFullYear();
//
//  return dd + '.' + mm + '.' + yyyy;
//}

$event = $_POST['header'];
$subscribe = $_POST['text'];
file_put_contents('tmpl/'.$date.'.txt', $date.' ; '.$event.' ; '.$subscribe);

$adminPage = 'http://127.0.0.1/admin.php';
$_GET[$adminPage];

//echo "<pre>";
//	print_r($_POST);
//echo "</pre>";
?>