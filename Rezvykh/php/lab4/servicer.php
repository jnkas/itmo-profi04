<?php
	header('Content-Type: application/json');
	//$_POST['dateFrom'] = '2017-12-01';
	//$_POST['dateTo'] = '2017-12-31';

	if (isset($_POST['dateFrom']) && empty($_POST['dateTo'])) {
		$fileDataJson = file_get_contents('tmpl/'.$_POST['dateFrom'].'.txt', FILE_USE_INCLUDE_PATH);
		echo $fileDataJson;
	} else if (isset($_POST['dateFrom']) && isset($_POST['dateTo'])) {

		$yearFrom = substr($_POST['dateFrom'], 0, 4);
		$yearTo = substr($_POST['dateTo'], 0, 4);
		$monthFrom = substr($_POST['dateFrom'], 5, 2);
		$monthTo = substr($_POST['dateTo'], 5, 2);

		//пока работает промежуток в одном месяце
		$dayFrom = intval(substr($_POST['dateFrom'], 8, 2));
		$dayTo = intval(substr($_POST['dateTo'], 8, 2));
		$fileDataStrFull = "[";

		$j = 1;
		for ($i = $dayFrom; $i <= $dayTo; $i++) {

			if ($i < 10) {
				$curDay = substr($_POST['dateFrom'], 0, 8) . "0" . $i;
			} else {
				$curDay = substr($_POST['dateFrom'], 0, 8) . $i;
			}

			$fileName = $curDay . '.txt';
			$fileFullPath = 'tmpl/' . $fileName;

			if (file_exists($fileFullPath)) { 

				$fileDataStr = file_get_contents($fileFullPath, FILE_USE_INCLUDE_PATH);

				//удаляем первый и последний символ
				$fileDataStr = substr($fileDataStr, 1, -1);

				if ($j > 1) {
					$fileDataStrFull .= " , $fileDataStr";
				} else {

					$fileDataStrFull .= $fileDataStr;
				}

			}

			$j++;
		}
		$fileDataStrFull .= "]";
		echo $fileDataStrFull;
	}
	
?>