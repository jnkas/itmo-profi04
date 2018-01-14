<?php
    //дата начала временного среза
	$dateFrom = $_POST['idFD'];
		$dateFromTime = strtotime($dateFrom);
		$dateFrom = date('d.m.Y',$dateFromTime);

    //дата окончания временного среза
	$dateTo = $_POST['idLD'];
		$dateToTime = strtotime($dateTo); 
		$dateTo = date('d.m.Y',$dateToTime);
	
	$countDays=(strtotime($dateTo) - strtotime($dateFrom))/(60*60*24); //считаем кол-во дней, включая случай когда начальная и конечные даты разных годов
	$ddFrom = date('d',$dateFromTime);
	$mmFrom = date('m',$dateFromTime);
	$yyyyFrom = date('Y',$dateFromTime);
	
	//формируем массив из дат
	for($i = 0; $i <= $countDays ; $i++) { 
		$_DATE[] = date("d.m.Y", mktime(0,0,0, $mmFrom, $ddFrom+$i, $yyyyFrom));
	}
	$arrLength = count($_DATE);

		//получить данные из файла в диапазоне $_POST['idFD'] $_POST['idLD']
		for ($j = 0; $j <= count($_DATE) -1; $j++){
			if ($file = file_get_contents('./tmpl/'.$_DATE[$j].'.txt',FILE_USE_INCLUDE_PATH )){
				$arrTextOfFile = explode(";", $file);
				$mass[] = array("date" => $arrTextOfFile[0], "header" => $arrTextOfFile[1], "desc" => $arrTextOfFile[2]);
			} else {
				$mass[] = array("date" => "$_DATE[$j]", "header" => "", "desc" => "Событие в доработке");
			}
			error_reporting( E_ERROR ); //отключить протоколирование ошибок
		}

	echo json_encode($mass, JSON_UNESCAPED_UNICODE);