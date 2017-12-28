<?php
echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/admin.css">
    <script src="js/form.js"></script>
    <script src="js/jquery.min.js"></script>
</head>
<body>

	<form id="formAdmin" action="handler.php" method="POST" onsubmit="event()">
	<div class="date"><p>Дата</p><input id="date" name="date" type="date"></div>
	<div class="header"><p>Заголовок</p><input id="header" name="header" type="text"></div>
	<div class="text"><p>Описание</p><textarea id="text" name="text"></textarea></div>
	<input class="button" type="submit" value="Записать">
	</form>
</body>
</html>'   
?>

<!--<form id="formAdmin" action="javascript:void(Null);" method="POST" onsubmit="event()">-->