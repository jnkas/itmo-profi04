<?php 
session_start();

$authFile = "auth.txt";
$sole = "Jljfj948aJdfjsng";
$message = "";

$authData = file_get_contents($authFile, FILE_USE_INCLUDE_PATH);
$authDataArray = explode(';', $authData);

$login = $_POST['login'];
$pass = $_POST['password'];
$issetLogin = in_array("$login", $authDataArray); 

if ($issetLogin == true) {
	$curPass = $authDataArray['1'];
	$passSole = md5("$pass$sole");

	if ($passSole == $curPass) {
		//Корректный пароль
		$message .= "
<div class='alert alert-success' role='alert'>
  <h4 class='alert-heading'>Вы авторизовались как $login!</h4>
  <p>Вам доступна административная часть сайта.</p>
  <hr>
  <p class='mb-0'>Перейти в <a href='../admin'>административную часть</a>. Или подождите 5сек.</p>
</div>
";
$_SESSION['auth'] = true;
$_SESSION['username'] = $login;
$_SESSION['password'] = $passSole;
header("refresh: 5; url=../admin");

	} else {
		//Неверный пароль
		$message .= "
<div class='alert alert-warning' role='alert'>
  <h4 class='alert-heading'>Неверная связка логина и пороля</h4>
  <p>Проверьте введенные данные.</p>
  <hr>
  <p class='mb-0'>Вернутся обратно на <a href='../admin'>форму авторизации</a>. Или подождите 5сек.</p>
</div>
";
header("refresh: 5; url=../admin");
}

} else {
	$message .= "
<div class='alert alert-warning' role='alert'>
  <h4 class='alert-heading'>Аккаунт не найден!</h4>
  <p>Аккаунт с логином $login не найден, проверьте правильность введенных данных.</p>
  <hr>
  <p class='mb-0'>Вернутся обратно на <a href='../admin'>форму авторизации</a>. Или подождите 5сек.</p>
</div>
";
header("refresh: 5; url=../admin");
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Научный календарь</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<div class='container'>
		<?php echo $message; ?>
	</div>
</body>
</html>