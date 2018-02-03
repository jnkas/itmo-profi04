<?php

include('config.php');
$arr_dir = array_diff(scandir('dir'), array('..', '.'));

foreach($arr_dir as $value) {
	echo '<div>';
	$dir_files = array_diff(scandir('dir/'.$value), array('..', '.'));
	$dir = $value;
	echo $dir.'<br>';
	foreach($dir_files as $value) {
		echo '<a href="dir/'.$dir.'/'.$value.'">'.$value.'</a><br>';
	}
	echo '</div>';
}

?>