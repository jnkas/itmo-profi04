
<html lang="ru">

    <head>
        <meta charset="utf-8">
        <title>Админка</title>

        <link rel="stylesheet" href="../css/style_admin.css">
    </head>

    <body>
	
		<div class="goSite"><a href="../index.php">На главную</a></div>
        <form action="login_handler.php" method="POST">
            <fieldset>
                <legend>Форма авторизации:</legend>

                <label for="login">Введите логин:</label>
                <input type="text" name="login" id="login">

                <label for="password">Введите пароль:</label>
                <input type="password" name="password" id="password">

                <input type="submit">
            </fieldset>
        </form>

    </body>

</html> 