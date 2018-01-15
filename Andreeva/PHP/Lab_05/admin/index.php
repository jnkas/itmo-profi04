<?php

session_start();

if ( isset($_SESSION['auth']) and $_SESSION['auth']==true){
    //показываем админку
    include "page_admin.php";
} else {
    //показываем форму логина
    include "login_admin.php";
}

?>