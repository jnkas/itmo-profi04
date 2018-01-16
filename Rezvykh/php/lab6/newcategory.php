<?php
include 'includes/translit.php';
include 'includes/categoryStructure.php';
include 'includes/readWrite.php';

$structure = categoryStructure();
$result = "";
$dir = 'category';
$categoryName = $_POST['newCategoryName'];
$categoryNameTranslite = str2url($categoryName);

function makeDir() {
	global $dir;
	global $categoryName;
	global $categoryNameTranslite;
	$res = "";

	if (mkdir("$dir/$categoryNameTranslite") == TRUE) {
		putDataNewCategory($categoryName, $categoryNameTranslite);
		$res .= "Категория <b> " . $categoryName . "</b> создана!";
		header("refresh: 3; url=admin.php");
	} else {
		$res .= "Ошибка создания директории!";
		header("refresh: 3; url=admin.php");
	}
	return $res;
}

if (isset($_POST['newCategoryName'])) {

	if ($structure == FALSE) {

		$result = makeDir();
		
	} else {
		if (in_array($categoryNameTranslite , $structure) == TRUE) {
			$result .= "Категория с таким названием уже существует, выберите другое название";
			header("refresh: 3; url=admin.php");
		} else {
			$result = makeDir();
		}
	}
	
} else {
	$result .= "Ошибка получения данных";
	header("refresh: 3; url=admin.php");
}

echo $result;