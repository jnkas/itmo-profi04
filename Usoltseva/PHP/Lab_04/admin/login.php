<!DOCTYPE html>
<html>
<head>
 <title>Log In Form</title>
 <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
 <h2>Для администрирования календаря введите логин и пароль</h2>
        <form action="login_handler.php" method="post">
                <label for="username">Имя пользователя</label>
                <input class="input-field" type="text" name="username" id="username">

                <label for="password">Пароль</label>
                <input class="input-field" type="text" name="password" id="password">

                <input type="checkbox" name="rememberme" value="<?php
echo $_COOKIE['rememberme']; ?>">Запомнить меня
                <button type="submit">Войти</button>
          </form>
</body>
</html>