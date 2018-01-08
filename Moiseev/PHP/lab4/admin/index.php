<?php

session_start();

if (isset($_GET["logout"]) && $_GET["logout"] == true) {
    session_unset();
}

if(isset($_SESSION) && $_SESSION['auth'] === true) {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <title>Admin</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>

    <body>
        <form action="../handler.php" method="POST" id="admin_page">

            <fieldset>
                <legend>Заполните поля для внесения информации в базу</legend>

                <label for="my_date">Выберите дату</label>
                <input type="date" name="date" id="my_date">

                <label for="my_header">Введите заголовок события</label>
                <input type="text" name="header" id="my_header">

                <label for="my_desc">Введите описание события</label>
                <textarea name="desc" id="my_desc"></textarea>

                <input type="submit" value="Отправить">
                <button type="button" onclick='location.href="index.php?logout=true"'>Logout</button>

            </fieldset>

<?php
} else {
?>

                <!DOCTYPE html>
                <html>

                <head>
                    <meta charset="UTF-8">
                    <title>Admin</title>
                    <link rel="stylesheet" href="../css/style.css">
                </head>

                <body>
                    <form action="login_handler.php" method="POST" id="auth_page">

                        <fieldset>
                            <legend>Авторизуйтесь</legend>

                            <label for="login">Введите логин</label>
                            <input type="text" name="login" id="login">

                            <label for="password">Введите пароль</label>
                            <input type="password" name="password" id="password">

                            <input type="submit" value="Войти">


                        </fieldset>

                    </form>

<?php 
}

?>



                    <!--
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <form action="../handler.php" method="POST" id="admin_page">

        <fieldset>
            <legend>Заполните поля для внесения информации в базу</legend>
            
            <label for="my_date">Выберите дату</label>
            <input type="date" name="date" id="my_date">
            
            <label for="my_header">Введите заголовок события</label>
            <input type="text" name="header" id="my_header">
            
            <label for="my_desc">Введите описание события</label>
            <textarea name="desc" id="my_desc"></textarea>
            
            <input type="submit" value="Отправить">

        </fieldset>

    </form>
-->

                    <!--
<form action="../login_handler.php" method="POST" id="auth_page">

    <fieldset>
        <legend>Авторизуйтесь</legend>

        <label for="login">Введите логин</label>
        <input type="text" name="login" id="login">

        <label for="password">Введите пароль</label>
        <input type="password" name="password" id="password">

        <input type="submit" value="Войти">
        <input type="submit" value="Выйти">

    </fieldset>

</form>



</body>

</html>
-->
