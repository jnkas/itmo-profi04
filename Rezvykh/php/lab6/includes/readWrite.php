<?php
$curFile = substr($_SERVER['PHP_SELF'], -9);
if ($curFile == 'index.php' || $curFile == 'admin.php' || $curFile == 'egory.php' || $curFile == 'wpage.php') {
	$cf = 'config.php';
} else {
	$cf = '../../config.php';
}

function getData() {
	global $cf;
	$dataJson = file_get_contents($cf, FILE_USE_INCLUDE_PATH);
	$dataArray = json_decode($dataJson, true);

	return $dataArray;
}

function putDataNewCategory($catName, $catNameTraslite) {
	global $cf;

	$data = getData();
	$key = $data['lastCatId'][0] + 1;
	$data['lastCatId'][0] = $key;
	$keyId = "id" . $data['lastCatId'][0];
	$data['category'][$keyId] = [];
	array_push($data['category'][$keyId], [$catNameTraslite => $catName]);

	$dataJson = json_encode($data);
	file_put_contents($cf, $dataJson);
}

function putDataNewPage($pageName, $pageTrasliteName, $catId) {
	global $cf;
	$data = getData();

	$key = $data['lastPageId'][0] + 1;
	$data['lastPageId'][0] = $key;
	$keyId = "pId" . $data['lastPageId'][0];

	$data['pages'][$keyId] = [];
	array_push($data['pages'][$keyId], [$pageTrasliteName =>$pageName]);

	if (!array_key_exists($catId, $data['pageInCat'])) {
		$data['pageInCat'][$catId] = [];
	}
	array_push($data['pageInCat'][$catId], $keyId);

	$dataJson = json_encode($data);
	file_put_contents($cf, $dataJson);
}

function getCategoryNamesData() {
	$data = getData();
	$cat = $data['category'];
	return $cat;
}

function getCategoryNameById($id, $flag) {
	//по умолчанию без $flag отдаем название обычное, с $flag == true с транслирацией
	$data = getData();
	$catData = $data['category'][$id][0];

	foreach ($catData as $key => $value) {
		if (isset($flag) && $flag == TRUE) {
			$result =  $key;
		} else {
			$result = $value;
		}
	}	
	return $result;
}

function printNavTree($flag) {
	//$flag == true рисуем горизонтальное меню, в обратном случае вертикальное

	$str = substr($_SERVER['PHP_SELF'], -9);
	if ($str == 'index.php') {
		$urlAdm = 'admin.php';
		$urlPage ='';
	} else if ($str == 'admin.php') {
		$urlAdm = 'admin.php';
		$urlPage ='';
	} else {
		$urlAdm = '../../admin.php';
		$urlPage ='../../';
	}

	if (isset($flag) && $flag == true) {
		$tree = "<ul class='navbar-nav'>";
		$data = getData();
		if (count($data['category']) > 0 ) {
			foreach ($data['category'] as $key => $value) {
				$curCatId = $key;
				foreach ($value as $key => $value) {
					foreach ($value as $key => $value) {
						$curCatName = $key;
						$tree .= "
						<li class='nav-item dropdown'>
							<a class='nav-link dropdown-toggle' href='#' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
								$value
							</a>";
						if (array_key_exists ( $curCatId , $data['pageInCat'] )) {
							$pageIds = $data['pageInCat'][$curCatId];
							$tree .= "<div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>";
							foreach ($pageIds as $pageId) {
								foreach ($data['pages'] as $key => $value) {
									if ($key == $pageId) {
										foreach ($value as $key => $value) {
											foreach ($value as $key => $value) {
												$tree .= "<a class='dropdown-item' href='$urlPage" . "category/$curCatName/$key" . ".php'>$value</a>";
											}
										}
									}
								}
							}
							$tree .= "</div>";
						}
						$tree .= "</li>";
					}
				}
			}
		}
		$tree .= "<span class='navbar-text'>
					<a href='$urlAdm'>Админка</a>
	      		</span>";
		$tree .= "</nav>";
	} else {
		$tree = "
			<nav class='navbar navbar-light bg-light'>
				<h5 class='card-title'>Структура сайта</h5>";

		$data = getData();

		if (count($data['category']) > 0 ) {
			foreach ($data['category'] as $key => $value) {
				$curCatId = $key;
				foreach ($value as $key => $value) {
					foreach ($value as $key => $value) {
						$curCatName = $key;
						$tree .= "<nav class='nav nav-pills flex-column'>$value";
						if (array_key_exists ( $curCatId , $data['pageInCat'] )) {
							$pageIds = $data['pageInCat'][$curCatId];
							foreach ($pageIds as $pageId) {
								foreach ($data['pages'] as $key => $value) {
									if ($key == $pageId) {
										$tree .= "<nav class='nav nav-pills flex-column'>";
										foreach ($value as $key => $value) {
											foreach ($value as $key => $value) {
												$tree .= "<a class='nav-link ml-3 my-1' href='category/$curCatName/$key" . ".php'>$value</a>";
											}
										}
									}
								}
							}
							$tree .= "</nav>";
						}
					}
				}
			}
		} else {
			$tree .= "Сайт пустой!";
		}
		  $tree .= "</nav>";
	}
	return $tree;
}