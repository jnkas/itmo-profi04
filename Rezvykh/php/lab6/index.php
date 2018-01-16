<?php 
include 'includes/readWrite.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Админка Doorway</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class='container'>
		<nav class='navbar navbar-expand-lg navbar-light bg-light'>
			<a class='navbar-brand' href='index.php'>Doorway</a>
			<button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNavDropdown' aria-controls='navbarNavDropdown' aria-expanded='false' aria-label='Toggle navigation'>
				<span class='navbar-toggler-icon'></span>
			</button>
			<div class='collapse navbar-collapse' id='navbarNavDropdown'>
				<?php echo printNavTree(true); ?>
			</div>
		</nav>
	</div>

	<div class='container'>
		<div class="row">
			<div class="col">
				<h1>Главная страница</h1>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type='text/javascript' src='js/popper.min.js'></script>
	<script type='text/javascript' src='js/bootstrap.min.js'></script>
	<script type="text/javascript" src="js/app.js"></script>
</body>
</html>