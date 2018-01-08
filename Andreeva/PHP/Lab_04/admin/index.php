<?php

session_start();

if ( isset($_SESSION['auth']) and $_SESSION['auth']==true){
    //показываем админку
   echo '
   <html lang="ru">
    
    <head>
        <meta charset="utf-8">
        <title>admin_calendar</title>
        <link rel="stylesheet" href="../css/style_admin.css">
    </head>

    <body>
        <form action="handler.php" method="POST">
                <h1>Форма ввода данных</h1>
                
                <label>Дата</label>
                <input type="date" name="date">
                
                <label>Заголовок</label>
                <input type="text" name="header">
               
               <label>Описание</label>
               <textarea name="desc" rows="10" cols="30"></textarea>
               
               <input type="submit">
        </form>
    </body>

    </html>
    ';

} else {
    
    //показываем форму логина
  echo '
    <html lang="ru">

    <head>
        <meta charset="utf-8">
        <title>admin_calendar</title>
        <link rel="stylesheet" href="../css/style_admin.css">
    </head>

    <body>
        <form action="login_handler.php" method="POST">
                <h1>Форма авторизации</h1>
                
                <label>Логин</label>
                <input type="text" name="login">
                
                <label>Пароль</label>
                <input type="password" name="passw" size="94">
                
                <input type="submit">
        </form>
    </body>

    </html>
    ';
}

?>