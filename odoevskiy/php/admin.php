<?php
echo 

'<meta charset="utf-8">
<style>
	body{
		background: #242943;
		margin: 0
		}
	h1{
		margin-top: 20px;	
		font-weight: 600;
		color: #fff;
		font-size: 1.5em;
		text-align: center;
		}
	div{
		
		margin: 0px auto;
		text-align: center;
		}
		input,textarea{
		background: #2b304a;
		border: 0;
		color: white;
		font-size: 15px;
		}
	.button {
		margin-top: 80px;
		height: 50px;
		width: 125px;
		border-radius: 5px;
		border: solid 1px #45ceff;
		font-size: 1em;
		}
</style>
<body>
	<form action="hendler_form.php" method="post">
	<div><h1>Дата</h1><input name="date" type="date"></div>
	<div><h1>Событие</h1><input name="event" type="text"></div>
	<div><h1>Описание</h1><br><textarea name="subscribe" cols="60" rows="10"></textarea></div>
	<div><input class="button" type="submit" value="Отправить"></div>
	</form>
</body>'
?>