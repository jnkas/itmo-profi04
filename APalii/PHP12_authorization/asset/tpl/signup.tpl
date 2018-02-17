<?php
	$tpl =  "<form action='./index.php?controller=controller&action=addUser' method='POST'>
			<input class='form-control' type='text' name='name' required><br>
			<input class='form-control' type='text' name='pass' required><br>			
			<button type='submit' class='btn btn-primary'>SignUP</button>
		</form>";
	echo $tpl; 
?>
