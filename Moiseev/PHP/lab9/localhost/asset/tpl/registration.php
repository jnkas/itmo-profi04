<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link rel="stylesheet" href="./asset/css/style.css">
</head>
<body>
    <button><a href="index" class="auth_page">На главную</a></button>
    <button><a href="auth" class="auth_page">Авторизация</a></button>

    <form action="registration" method="POST" class="auth_page">
        <fieldset>
            <legend>Зарегистрируйтесь</legend>

            <label for="username">Введите ФИО</label>
            <input type="text" name="username" id="username" required value="<?= ($data)? $data[0] : null; ?>">

            <label for="login">Введите логин</label>
            <input type="text" name="login" id="login" required value="<?= ($data)? $data[1] : null; ?>">

            <label for="password1">Введите пароль</label>
            <input type="password1" name="password1" id="password1" required>

            <label for="password2">Повторите пароль</label>
            <input type="password2" name="password2" id="password2" required>

            <input type="submit" name="reg_submit" value="Отправить">
        </fieldset>
    </form>
</body>
</html>