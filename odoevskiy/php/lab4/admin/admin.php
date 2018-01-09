<? 
$auth = explode(".", file_get_contents('pass.txt'));
$login_true = $auth[0];
$password_true = $auth[1];
$login = md5($_POST['login']);
$password = md5($_POST['password']);

$session_false = '
	<style>
		.form-login{
		    text-align: center;
		}
		.button {
			border: 1px solid;
			background: none;
			margin: 20px;
			padding: 2px 10px;
		}
	</style>
	<meta charset="UTF-8">
	<div class="form-login">
		<form action="admin.php" method="post">
			<div><p>Login:</p><input name="login" type="text"></input></div>
			<div><p>Password:</p><input name="password" type="password"></input></div>
			<div><input name="button" type="submit" value="login" class="button"></div>
		</form>
	</div>';
$session_true ='
	<meta charset="utf-8">
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
		a {
			position: absolute;
			right: 14px;
			text-decoration: none;
			border: 1px solid #45ceff;
			border-radius: 3px;
			padding: 7px;
			color: #fff;
			font-family: sans-serif;
			}
	</style>
	<body>
		<a href="out_session.php">Выход</a>
		<form action="../hendler_form.php" method="post">
			<div><h1>Дата</h1><input name="date" type="date"></div>
			<div><h1>Событие</h1><input name="event" type="text"></div>
			<div><h1>Описание</h1><br><textarea name="subscribe" cols="60" rows="10"></textarea></div>
			<div><input class="button" type="submit" value="Отправить"></div>
		</form>
		
	</body>';
	
session_start();
if ( isset($_SESSION["auth"]) && $_SESSION["auth"] === true) {
	echo $session_true;
} else {
	echo $session_false;
	if($login_true == $login and $password_true == $password) {
	$_SESSION["auth"] = true;
	};	
}
?>