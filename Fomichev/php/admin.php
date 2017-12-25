<?php
echo 
'<meta charset="utf-8">
<style>
body{
		background: grey;
		margin: 0
		}
h1{
			
		font-weight: 650;
		color: black;
		font-size: 30px;
		text-align: center;
		}
div{
		
		margin: 0px auto;
		text-align: center;
		}
        
input,textarea{
		background: #fff;
		border: 0;
		color: black;
		font-size: 15px;
		}
        
        
.button {

		margin-top: 50px;
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