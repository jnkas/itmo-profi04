<?php

    session_start();
    if ( isset ($_SESSION['auth']) and $_SESSION['auth'] === true  ){

        //показываем админку
        include "form_data_entry.php";

    } else {
        //показываем форму авторизации
        include "form_enter.php";
    } 
    
?>