<?php
include 'includes/categoryStructure.php';
include 'includes/readWrite.php';
$isNewSite = categoryStructure();

function newCategory() {
	global $isNewSite;
	$result = "";

	if ($isNewSite == FALSE) {
		$result .= "
		<form enctype='multipart/form-data' action='newcategory.php' method='POST'>
		<div class='alert alert-warning' role='alert'>На сайте нет категорий, создайте новую:
			<div class='input-group mb-3'>
				<input type='text' class='form-control' placeholder='Название категории' name='newCategoryName'>
				<div class='input-group-append'>
				<button class='btn btn-outline-secondary btn-primary' type='submit'>Создать</button>
		</div>
		</div></form>";
	} else {
	$result .= "
		<form enctype='multipart/form-data' action='newcategory.php' method='POST'>
			<div id='formNewFolder' class='input-group mb-3' style='display:none;'>
				<input type='text' class='form-control' placeholder='Новая категория' name='newCategoryName'>
				<div class='input-group-append'>
				<button class='btn btn-outline-secondary btn-primary' type='submit'>Создать</button>
			</div>
		</form>";
	}
	return $result;
}

function printMainForm() {
	$structure = categoryStructure();

	if ($structure != FALSE) {
		
	$folders = "
		<div class='input-group'>
			<select class='custom-select' name='selectedCategory'>
				<option selected>Выбирите категорию...</option>";

	$category = getCategoryNamesData();
	
	foreach ($category as $key => $value) {
		$folders .= "<option value=$key>";
		foreach ($value as $key => $value) {
			foreach ($value as $key => $value) {
				$folders .= "$value</option>";
			}
		}
	}

	$folders .= "
			</select>
			<div class='input-group-append'>
				<button id='buttonNewFolder' class='btn btn-outline-secondary' type='button'>Создать новую категорию</button>
			</div>
		</div>
	";

	$form = "
	<h5 class='card-title'>Добавление новой страницы</h5>
		<form enctype='multipart/form-data' action='newpage.php' method='POST'>
			<div class='form-group form-control-md'>
				$folders						
			</div>
			<div class='form-group form-control-md'>
				<label>Название страницы</label>
				<input class='form-control' type='text' name='pageName'>
			</div>
			<div class='form-group form-control-md'>
				<label>Шаблон страницы</label>
				<textarea class='form-control' name='pageTemplate'></textarea>
			</div>
			<button type='submit' class='btn btn-primary'>Сохранить</button>
		</form>";

	} else {
		$form = "";
	}
	return $form;

}

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