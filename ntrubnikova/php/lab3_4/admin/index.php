<?php 
header('Content-Type: text/html; charset=utf-8');
//session_start();
// Если переменная существует и auth = true, то показываем форму ивента
//в противном случае показываем форму логина
//session_stop();

$autForm = '
<html>
   <header>
     <title>Форма авторизации</title>
      <meta charset="UTF-8">
       <link rel="stylesheet" href="../css/admin.css">
   </header>
    <body>
       <div id="container">
       <h2>Войти</h2>
       <div id="form">
        <form action="login_handler.php" method="post" accept-charset="UTF-8">
            Имя пользователя:<br>
            <input type="text" name="login"><br>
            Пароль:<br>
            <input type="password" name="password"><br>
            <button type="submit">Войти</button>
            <button type="reset">Сбросить</button>
        </form>
        </div>
        </div>
    </body>
</html>
';

$eventForm = '
<html>
   <header>
     <title>Событие для календаря</title>
      <meta charset="UTF-8">
       <link rel="stylesheet" href="../css/admin.css">
   </header>
    <body>
       <div id="container">
       <h2>Событие для календаря</h2>
       <div id="form">
        <form action="handler.php" method="post">
            Дата:<br>
            <input type="date" name="date"><br>
            Заголовок:<br>
            <input type="text" name="title"><br>
            Текст:<br>
            <textarea name="description"></textarea><br>
            <button type="submit">Записать</button>
            <button type="reset">Сбросить</button>
        </form>
        </div>
        </div>
    </body>
</html>
';

session_start();

if ($_SESSION['authorized'] === "yes") {
    echo $eventForm;
}
else {
    echo $autForm;
}
?>


