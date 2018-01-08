<?php

$username = $_POST['username'];
$password = $_POST['password'];
$file = 'auth.txt';
$check = file_get_contents($file, FILE_USE_INCLUDE_PATH);
$authCheck = explode(',', $check);
$hour = time() + 3600;

if($username === $authCheck[0] && $password === $authCheck[1]){
setcookie('rememberme', $_POST['username'], $hour);

if($_POST['rememberme']) {
setcookie('rememberme', $_POST['username'], $hour);
    header("Location:admin.php");
} elseif(!$_POST['rememberme']) {
	if(isset($_COOKIE['rememberme'])) {
		$past = time() - 100;
		setcookie(remember_me, gone, $past);
	}
}
}