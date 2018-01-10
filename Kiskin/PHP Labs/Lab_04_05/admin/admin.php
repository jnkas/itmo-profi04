<?php

session_start();

if (isset($_GET["logout"]) && $_GET["logout"] == true) {
    session_unset();
}

if(isset($_SESSION) && $_SESSION['auth_page'] === true) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
	<form id="formAdmin" action="form_handler.php" method="POST" onsubmit="event()">
	<div class="date"><p>Дата</p><input id="date" name="date" type="date"></div>
	<div class="header"><p>Заголовок</p><input id="header" name="header" type="text"></div>
	<div class="text"><p>Описание</p><textarea id="text" name="text"></textarea></div>
	<input class="button" type="submit" value="Записать">
	<button id="logout" type="button" onclick='location.href="admin.php?logout=true"'>ВЫЙТИ</button>
	</form>
</body>
</html>

<?php
    
} else {
    
?>
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <form action="login_handler.php" method="POST" id="auth_page">
	<div class="login"><p>Имя пользователя</p><input id="login" name="login" type="text"></div>
	<div class="password"><p>Пароль</p><input id="password" name="password" type="password"></div>
	<input id="enter" class="button" type="submit" value="Войти">
	</form>
</body>
</html>

<?php 
}

?>
