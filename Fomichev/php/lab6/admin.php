<?php

include('config.php');

echo '
<meta charset="utf-8">
<link rel="stylesheet" href="css/style_admin.css">
<div id="lnk"><a id="lnk_a" id="btn" href="index.php">меню</a></div>
<form action="admin.php" method="post">
	<div id="adm_form">'
	
?>  	
		<div>
			<select name="category">
				<option value="">Выберите категорию</option>
					<?php
						foreach($names_arr as $key => $value) {
							echo '<option value="'.$value.'">'.$key.'</option>';
						}
					?>
			</select>
		</div>
<?php

echo '
		<div id="inp"><input name="name" type="text" placeholder="Имя файла"></div>
		<div id="inp"><textarea name="description" type="text" cols="54" rows="10" placeholder="Содержание"></textarea></div>
		<div id="inp"><input id="btn" name="button" type="submit" value="Создать"></div>
	</div>';
			
$category = $_POST['category'];
$name = $_POST['name'];
$description = $_POST['description'];

$default_file = 'default.php';
$new_directory = iconv("UTF-8", "WINDOWS-1251", 'dir/'.$category);
$new_file = iconv("UTF-8", "WINDOWS-1251", 'dir/'.$category.'/'.$name.'.php');

if (strlen($name) == 0 or strlen($category) == 0) {
	echo '<p>Выберете категорию и введите имя файла.</p>';

} elseif (!file_exists($new_directory)) {
	mkdir($new_directory);
	
} elseif (!file_exists($new_file)) {
	copy($default_file, $new_file);
	$fo = fopen($new_file, 'a+');
	fwrite($fo, $description.'</p></body></html>');
	fclose($fo);
	echo '<p>Файл '.$name.'.php создан в дирректории '.$category.'.</p>';
	
} elseif ((file_exists($new_file))) {
	echo '<p> Файл с таким именем уже существует в дирректории '.$category.'.</p>';
}

?>