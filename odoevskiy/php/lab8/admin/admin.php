<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../css/style.css">
	</head>
	<body>
		<a href="../forum_page.php">Форум</a>
		<form action="../index.php" method="post">
			<div>
			<h1>Номер строки</h1><input name="str_number" type="text">
			<h1>Название</h1><input name="name" type="text"></div>
			<div><h1>Описание</h1><br><textarea name="subscribe" cols="60" rows="10"></textarea></div>
			<div>
				<input id="button" type="submit" name="create" value="Создать" title="Введите название и описание. Номер строки вводить не нужно">
				<input id="button" type="submit" name="edit" value="Изменить" title="Введите номер строки, которую хотите изменить, новое название и описание">
				<input id="button" type="submit" name="delete" value="Удалить" title="Введите номер строки, которую хотите удалить. Название и описание вводить не нужно">
				<input id="button" type="submit" name="delete_all" value="Удалить все" title="Удалить все">
			</div>
		</form>		
	</body>';
</html>