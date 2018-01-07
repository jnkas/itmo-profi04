<?php

header('Content-Type: text/html; charset=utf-8');

$autForm = '
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
';

$eventForm = '
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
';

session_start();

if ($_SESSION['authorized'] === "yes") {
    $pageName = "События для календаря - Форма";
    include "../header.php";
    echo $eventForm;
}
else {
    echo $autForm;
    $pageName = "Войти";
    include "../header.php";
}

include "../footer.php";
?>


