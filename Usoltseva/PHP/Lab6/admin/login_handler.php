<?php
	session_start();

	header('Location: index.php');

	$login = $_POST['login'];
	$password = $_POST['password'];
	
	
	
	$file = file_get_contents('auth_admin.txt',FILE_USE_INCLUDE_PATH );

    $arrTextOfFile = explode(";", $file);
	
	
	if($login === $arrTextOfFile[0] and $password === $arrTextOfFile[1]){

		$_SESSION['auth'] = true;
		exit();
		
	} else {
		echo 'wrong password!';
	}

?>