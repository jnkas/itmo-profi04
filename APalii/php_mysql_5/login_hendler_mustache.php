<?php
session_start();
// verification for 
if (isset($_POST['log']) && $_POST['log'] == "in"){
	
	if (isset( $_POST['login']) && isset( $_POST['psw'])){
		$login = $_POST['login'];
		$psw = md5($_POST['psw']);
	}	

	$filepath = "tmp/session.txt";
	$authJSON = file_get_contents($filepath);
	$authArray = json_decode($authJSON, true);
	//var_dump($authArray);


	$_SESSION['auth'] = false;
	foreach($authArray as $value) {
		if ($login == $value["login_name"]){
			echo "name is OK<br>";
			if ($psw == $value["password"]){
				echo "authorized<br>";
				$_SESSION['auth'] = true;
			} else {
				echo "not authorised<br>";
			}	
			break;
		} 
	}
	if(!$_SESSION['auth']) echo "Not such name , pls try again.";

	
} elseif(isset($_POST['log']) && $_POST['log'] == "out") {
	session_destroy();
}
//Redirect to admin_ext
header('location: http://localhost/php/admin_ext_mustache.php');
exit; 

?>