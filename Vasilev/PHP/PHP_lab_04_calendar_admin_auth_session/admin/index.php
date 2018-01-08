<?php

session_start();
if ( isset ($_SESSION['auth']) and $_SESSION['auth'] === true  ){

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
					<fieldset>
						<legend>Форма ввода данных для календаря</legend>

						<label for="date">Дата события:</label>
						<input type="date" name="date" id="date">

						<label for="header">Наименование события:</label>
						<input type="text" name="header" id="header">

						<label for="desc">Описание события:</label>
						<textarea name="desc" id="desc" rows="10" cols="30"></textarea>

						<input type="submit">
					</fieldset>
				</form>
				
			</body>
			
		</html> ';
} else {
	

	//показываем форму авторизации
	echo '

		<html lang="ru">

			<head>
				<meta charset="utf-8">
				<title>admin_calendar</title>

				<link rel="stylesheet" href="../css/style_admin.css">
			</head>

			<body>
			
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
			
		</html> ';	

} 
    
?>