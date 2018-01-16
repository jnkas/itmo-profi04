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
				<?php include 'menu.php' ?>
				
				<span>
					<a href='#'>Админка</a>
	      		</span>
			</div>
		</nav>
	</div>

	<div class='container'>
		<div class="row">
			<div class="col">
				<div class="card">
					<div class="card-header">
						<ul class="nav nav-tabs card-header-tabs">
							<li class="nav-item">
								<a class="nav-link active" href="#">Добавить страницу</a>
							</li>
							<!--<li class="nav-item">
								<a class="nav-link" href="#">Link</a>
							</li>
							<li class="nav-item">
								<a class="nav-link disabled" href="#">Disabled</a>
							</li> -->
						</ul>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-3">
								<?php echo printNavTree(false); ?>
							</div>
							<div class="col-md-9">
								<div>
								<?php echo newCategory(); ?>
								</div>
								<?php echo printMainForm(); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type='text/javascript' src='js/popper.min.js'></script>
	<script type='text/javascript' src='js/bootstrap.min.js'></script>
	<script type="text/javascript" src="js/app.js"></script>
</body>
</html>