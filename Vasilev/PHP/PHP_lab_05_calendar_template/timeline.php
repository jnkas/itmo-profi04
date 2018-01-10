<?php

	$firstDate = $_POST['idFD'];// 2017-12-21
		$dateFirstTime = strtotime($firstDate); 
		$firstDate = date('d.m.Y',$dateFirstTime); // 21.12.2017

	$lastDate = $_POST['idLD'];// 2017-12-21
		$dateLastTime = strtotime($lastDate); 
		$lastDate = date('d.m.Y',$dateLastTime); // 21.12.2017

	//$numbOfDays = $lastDate - $firstDate; //данная формула некорректно считает, если начальная и конечные даты разных годов.
	$numbOfDays = (strtotime($lastDate) - strtotime($firstDate))/(60*60*24); //считаем кол-во дней в диапазона дат.

	$ddFirst = date('d',$dateFirstTime);
	$mmFirst = date('m',$dateFirstTime);
	$yyyyFirst = date('Y',$dateFirstTime);

	for($i = 0; $i <= $numbOfDays ; $i++) { 
		$_DATE[] = date("d.m.Y", mktime(0,0,0, $mmFirst, $ddFirst+$i, $yyyyFirst)); //секунды, полученные от mktime() преобразуем в дату дд.мм.гггг
	} 

	/*
		var_dump ($_DATE);
		echo "<br><br>";
		echo "<br><br>";
	*/

	$arrLength = count($_DATE);

	/*    echo $arrLength;
		echo "<br><br>";
		echo "<br><br>";*/
		
		// TO-Do Получить данные из файла в диапазоне $_POST['dt_start'] $_POST['dt_end']
		for ($j = 0; $j <= count($_DATE) -1; $j++){
			$file = @file_get_contents('./tmpl/'.$_DATE[$j].'.txt',FILE_USE_INCLUDE_PATH); //символ @ проставлен, чтобы, если файл отсутствувет - не поступало сообщение об ошибке.
			$arrTextOfFile = explode(";", $file);
			
			if ($file){
				$mass[] = array("date" => $arrTextOfFile[0], "dateDDMM" => date("d.m", strtotime($_DATE[$j])), "header" => $arrTextOfFile[1], "desc" => $arrTextOfFile[2]);
			} else {
				$mass[] = array("date" => "$_DATE[$j]", "dateDDMM" => date("d.m", strtotime($_DATE[$j])), "header" => "...", "desc" => "На выбранную дату события в справочнике нет.. =(");
			}
			//error_reporting( E_ERROR ); //скрыть отключение предупреждений warning (не требуется, т.к проставлен символ @)
		}

	echo json_encode($mass, JSON_UNESCAPED_UNICODE);