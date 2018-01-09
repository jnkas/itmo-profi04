<?php

session_start();

$login = md5($_POST['login']);
$password = md5($_POST['password']);
$file = 'sessions.txt';

$revise_str = file_get_contents($file, FILE_USE_INCLUDE_PATH);
$arr_sessions = explode(' ', $revise_str);

if($login === $arr_sessions[0] && $password === $arr_sessions[1]) {
    $_SESSION['auth_page'] = true;
    header("Location: admin.php");
    exit();
} else {
    $_SESSION['auth_page'] = false;
    header("Location: admin.php");
    exit();
};
?>