<?php 
session_start();

$headerHtml = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'><title>Админка</title><link rel='stylesheet' href='../css/bootstrap.min.css' crossorigin='anonymous'><link rel='stylesheet' type='text/css' href='../css/style.css'></head><body>";
$bottomHtml = "<script type='text/javascript' src='../js/jquery-3.2.1.min.js'></script><script type='text/javascript' src='../js/popper.min.js'></script><script type='text/javascript' src='../js/bootstrap.min.js'></script></body></html></body></html>";


if (isset($_SESSION['auth']) and $_SESSION['auth'] == true) {
	$authBlock = "Привет, " . $_SESSION['username'] . " | <a href='logout.php'>Выход</a>";
} else {
	$authBlock = "<a href='index.php'>Вход</a>";
}


$navbarHtml = "
<div class='container'>
	<nav class='navbar navbar-expand-lg navbar-light bg-light justify-content-between'>
		<a class='navbar-brand' href='../'>Календарь</a>
		<button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNavDropdown' aria-controls='navbarNavDropdown' aria-expanded='false' aria-label='Toggle navigation'>
			<span class='navbar-toggler-icon'></span>
		</button>
		<div class='collapse navbar-collapse' id='navbarNavDropdown'>
			<ul class='navbar-nav mr-auto'>
				<li class='nav-item'>
					<a class='nav-link' href='#'>Админка</a>
				</li>
			</ul>
			<span>
	      		$authBlock
	      	</span>
		</div>
	</nav>
</div>";

$formHtml = "
<div class='container'>
	<h1>Форма добавления мероприятий</h1>
	<form enctype='multipart/form-data' action='heandler.php' method='POST'>
		<div class='form-group form-control-md'>
			<label>Дата мероприятия</label>
			<input class='form-control' type='date' name='date'>
		</div>
		<div class='form-group form-control-md'>
			<label>Наименование мероприятия</label>
			<input class='form-control' type='text' name='header'>
		</div>
		<div class='form-group form-control-md'>
			<label>Описание мероприятия</label>
			<textarea class='form-control' name='description'></textarea>
		</div>
		<div class='form-group form-control-md'>
			<label for='exampleFormControlFile1'>Фотография мероприятия</label>
			<input type='file' class='form-control-file' name='imgfile'>
		</div>
		<button type='submit' class='btn btn-primary'>Сохранить</button>
	</form>
</div>";

$authFormHtml = "
<div class='container'>
	<div class='row'>
		<div class='col'></div>
		<div class='col'>
			<div class='authform'>
				<h4>Авторизация</h4>
				<form action='auth.php' method='POST'>
					<div class='form-group row'>
						<label class='col-sm-2 col-form-label'>Логин</label>
						<div class='col-sm-10'>
							<input type='text' class='form-control' name='login' placeholder='Логин'>
						</div>
					</div>
					<div class='form-group row'>
						<label class='col-sm-2 col-form-label'>Пароль</label>
						<div class='col-sm-10'>
							<input type='password' class='form-control' name='password' placeholder='Пароль'>
						</div>
					</div>
					<div class='form-group row'>
						<div class='col-sm-10'>
							<button type='submit' class='btn btn-primary'>Авторизоваться</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class='col'></div>
	</div>
</div>";

if (isset($_SESSION['auth']) and $_SESSION['auth'] == true) {
	echo $headerHtml . $navbarHtml . $formHtml . $bottomHtml;
} else {
	echo $headerHtml . $navbarHtml . $authFormHtml . $bottomHtml;
}





























?>