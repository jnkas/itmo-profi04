<?php
require "includes/readWrite.php";
require "includes/translit.php";

$title = $_POST['pageName'];
$pageTranliteName = str2url($title);
$catFolder = getCategoryNameById($_POST['selectedCategory'], true);
$fileFullPath = "category/" . $catFolder . "/" . $pageTranliteName . ".php";

$template = file_get_contents('tmpl.php', FILE_USE_INCLUDE_PATH);

$tmplTitle = str_replace("%TITLE%" , $title , $template);

$content = "<h1>" . $title . "</h1>" . "<article>" . $_POST['pageTemplate'] .  "</article>";

$tmplContent = str_replace("%CONTENT%" , $content , $tmplTitle);

file_put_contents($fileFullPath, $tmplContent);

putDataNewPage($title, $pageTranliteName, $_POST['selectedCategory']);

echo "Страница <b>" . $title . "</b> создана!";
header("refresh: 3; url=admin.php");
