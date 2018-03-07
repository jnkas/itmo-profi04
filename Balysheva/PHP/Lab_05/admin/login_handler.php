<?php

session_start();

$login = md5($_POST['login']);
$password = md5($_POST['password']);
$file = 'lp.txt';

$revise_str = file_get_contents($file, FILE_USE_INCLUDE_PATH);
$arr_lp = explode(' ', $revise_str);

if($login === $arr_lp[0] && $password === $arr_lp[1]) {
    $_SESSION['auth'] = true;
    header("Location: index.php");
    exit();
} else {
    $_SESSION['auth'] = false;
    header("Location: index.php");
    exit();
};
?>