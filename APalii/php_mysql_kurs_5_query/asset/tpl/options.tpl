<?php
	$tpl = "<script type=\"text/javascript\" src=\"./asset/js/app_options.js\"></script>";
	$tpl .= "<select id = 'tariff'>";
	foreach ($data as $val) {
		$tpl .= "<option value='".$val["tariff_id"]."'>". $val["tariff_name"] ." </option>"; 
	}
	$tpl .= "</select><button id = '3rd_selector'>Ok</button>";
	
	echo $tpl; 
?>