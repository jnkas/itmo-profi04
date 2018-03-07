<?php 
$str = 'title';



$headerHTML = "
<!DOCTYPE html>
<html>
	<head>
		<meta charset='UTF-8'><title>Admin interface</title><link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css' integrity='sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb' crossorigin='anonymous'>
	</head>
<body>";

$bottomHTML = "<script type='text/javascript' src='js/jquery-3.2.1.min.js'></script>
</body>
</html>";

$authfailHTML = "
	<div class='container'>
		<div class='form-group form-control-lg'>
			<label>Incotrect login or password</label>
		</div>
	</div>";
	
$authformHTML =	"
	<div class='container'>
		<form action='login_hendler.php' method='POST' enctype='multipart/form-data'>
			<div class='form-group form-control-lg'>
				<label>Login</label>
				<input class='form-control' type='login' name='login'>
			</div>
			<div class='form-group form-control-lg'>
				<label>Password</label>
				<input class='form-control' type='psw' name='psw'>
			</div>
			
			<div class='form-group form-control-lg'><button type='submit' class='btn btn-primary' name='log' value='in'>Login</button></div>
	  </form>
	</div>";

$formHTML =	"
	<div class='container'>
		<form action='login_hendler.php' method='POST'>
 			<div class='form-group form-control-lg'><button type='submit' class='btn btn-primary' name='log' value='out'>Logout</button></div>
	  </form>

		<form action='hendler_form.php' method='POST' enctype='multipart/form-data'>
			<div class='form-group form-control-lg'>
				<label>Data</label>
				<input class='form-control' type='date' name='date'>
			</div>
			<div class='form-group form-control-lg'>
				<label>Title</label>
				<input class='form-control' type='text' name='title'>
			</div>
			<div class='form-group form-control-lg'>
				<label>Description</label>
				<textarea class='form-control' type='text' name='description'></textarea>

		
			</div>
			<div class='form-group form-control-lg' ><input type='file' class='btn btn-primary' name='fileToUpload' id='fileToUpload'></div>
	    
			<div class='form-group form-control-lg'><button type='submit' class='btn btn-primary'>Send and Save record on the server</button></div>
	  </form>

	</div>";

function authenticate($username, $password) {
if (!$username || !$password) {
return false;
}
// проверяем введенный логин/пароль
session_name('itmo_it');
session_save_path('/home/itmo-it/www/tmp');
session_start();
return true;
}



session_start();
//echo $_SESSION ['auth'];
if (isset( $_SESSION['auth']) and $_SESSION['auth'] == true)
 {// show admin UI
	echo $headerHTML . $formHTML . $bottomHTML;
	//header("Location","index.html"); 
} elseif (isset( $_SESSION['auth']) and $_SESSION['auth'] == false){
	echo $headerHTML . $authfailHTML . $authformHTML . $bottomHTML;
} else {
	echo $headerHTML . $authformHTML . $bottomHTML;
	
// form verification

	//$_SESSION['auth'] == true;
//show login form
	//echo "form";
}
	

	
//in case logout we will need to del session will do 
//function logout(
//session_destroy(); /
//)


	


?>

<h1><?php echo $str; ?></h1> 