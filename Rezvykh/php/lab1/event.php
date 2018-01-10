<?php
$filePath = "tmpl/";
$fileName = substr($_GET['id'], 0, 10);
$postId = substr($_GET['id'], 11);

$fileDataJson = file_get_contents('tmpl/'.$fileName.'.txt', FILE_USE_INCLUDE_PATH);
$fileDataArray = json_decode($fileDataJson);
$eventData = (array) $fileDataArray[$postId];

?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Научный календарь</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class='container'>
		<nav class='navbar navbar-expand-lg navbar-light bg-light'>
			<a class='navbar-brand' href='index.php'>Календарь</a>
			<button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNavDropdown' aria-controls='navbarNavDropdown' aria-expanded='false' aria-label='Toggle navigation'>
				<span class='navbar-toggler-icon'></span>
			</button>
			<div class='collapse navbar-collapse' id='navbarNavDropdown'>
				<ul class='navbar-nav mr-auto'>
					<li class='nav-item'>
						<a class='nav-link' href='admin/'>Админка</a>
					</li>
				</ul>
				<span>
				<?php 
				session_start();
				if (isset($_SESSION['auth']) and $_SESSION['auth'] == true) {
	      		echo "Привет, " . $_SESSION['username'] . " | <a href='admin/logout.php'>Выход</a>";
	      		} else { echo "<a href='admin/index.php'>Вход</a>";}
	      		?>
	      	</span>
			</div>
		</nav>
	</div>
	<div class="container">
		<header>
			<h1><?php echo $eventData['header']; ?></h1>
		</header>
		<article>
			<img src="img/<?php echo $eventData['img'];?>">
			<p><?php  echo $eventData['description']; ?></p>
			
		</article>


	</div>
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type='text/javascript' src='js/popper.min.js'></script>
	<script type='text/javascript' src='js/bootstrap.min.js'></script>
	<script type="text/javascript" src="js/app.js"></script>
</body>
</html>