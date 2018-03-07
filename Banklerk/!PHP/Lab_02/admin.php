<?php
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Админка календаря</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div id="day-calender">
		<form action="handler_form.php" method="post">
			<fieldset> <legend><b>Админка научного календаря</b></legend>
				<p>
					<label for="inpDataEvent">Дата события:</label>
					<input type="date" id="inpDateEvent" name="dateEvent"/>
				</p>
				<p>
					<label for="inpHeadEvent">Заголовок события:</label>
					<input id="inpHeadEvent" type="text" name="headEvent"/>
				</p>
				<p>
					<label for="inpDescriptionEvent">Описание события:</label>
					<textarea name="descriptionEvent" id="inpDescriptionEvent" cols="50" rows="10"></textarea>
				</p>
				<p>
					<button type="submit">Отправить</button>
				</p>
			</fieldset>
		</form>
	</div>
</body>
</html>
