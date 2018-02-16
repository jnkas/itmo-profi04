<?php

include "config.php";

$arr_pageMenu = "<div class='header'>";

foreach($arr_page as $value) {
	$dir = '../'. array_search($value, $arr_page);
	$files = '';
	
	if (is_dir($dir)){
		$files  = array_slice(scandir($dir),2);
		$filesHTML = '';
		
		
		foreach($files as $val){
			$buffer = explode("\n",file_get_contents($dir. '/' . $val));
			$name = strip_tags($buffer[4]);
			$filesHTML .= '<a href="'. $dir. '/' . $val. '">' .$name. '</a>';
			
		};
		$arr_pageMenu = '<div class="down">
		<button class="category">'. $value. '</button>
		<div class="pages">'. $filesHTML. '</div></div>';			
	}
}

$arr_pageMenu .='</div>';
echo $arr_pageMenu;

?>