<?php
session_start();
if (isset( $_session['auth']) and $_session['auth'] == true)
{
//  показать админку
    eho 'admin';
} else {
//    проверка формы
    $_session['auth'] = true;
    echo "form";
}



?>