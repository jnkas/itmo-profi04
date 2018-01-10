<?php
	session_start();

	header('Location: admin.php');

	$login = $_POST['login'];
	$password = $_POST['password'];
	
	$passwordModif = md5($password);
	
	$file = file_get_contents('auth_admin.txt',FILE_USE_INCLUDE_PATH );

    $arrTextOfFile = explode(";", $file);
	
	
	if($login === $arrTextOfFile[0] and $passwordModif === $arrTextOfFile[1]){

		$_SESSION['auth'] = true;
		exit();
		
	} else {
		echo 'wrong password!';
	}

?>