<?php

include('config.php');
$arr_dir = array_diff(scandir('dir'), array('..', '.'));
$div_width = 100 / count($arr_dir);
echo '
<style>
	div {
	float: left;
	width:'.$div_width.'%;
	}
	a {
	text-decoration: none;
	color: black;
	}
	a:visited {
	text-decoration: none;
	color: black;
	}
	a:hover {
	color: #3f51b5;
	text-decoration: underline;
	}
</style>';

include('menu.php');

?>