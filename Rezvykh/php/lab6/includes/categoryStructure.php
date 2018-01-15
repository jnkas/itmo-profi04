<?php
function categoryStructure() {
	$dir = 'category';
	$fullStructure = scandir($dir);
	$onlyFolders = [];
	foreach ($fullStructure as $value) {
		if(is_dir("$dir/$value") && $value!='.' && $value!='..') {
			array_push($onlyFolders, $value);
		}
	}
	if (count($onlyFolders) == 0) {
		$onlyFolders = FALSE;
	}
	return $onlyFolders;
}

