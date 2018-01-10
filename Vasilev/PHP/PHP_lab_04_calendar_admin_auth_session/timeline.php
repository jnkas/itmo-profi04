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
	
	//формируем массив из дат, входящих в выбранный пользователем диапазон
	for($i = 0; $i <= $numbOfDays ; $i++) { 
		$_DATE[] = date("d.m.Y", mktime(0,0,0, $mmFirst, $ddFirst+$i, $yyyyFirst)); //секунды, полученные от mktime() преобразуем в дату дд.мм.гггг
	}

	$arrLength = count($_DATE);

	function genFeed( $mass) {
		foreach($mass as $key => $value) {
			 $content .= '<div class="timeline"><img class="imgTML" src="img/'.$value['date'].'.jpg" width=140><h1>' .date("d.m", strtotime($value['date'])).' - '. $value['header']  . '</h1> <p>' . $value['desc'].  ' </p></div>';
		}
		return $content;
	}


	function generateHTML($_DATE) {

		$header= '
		<!DOCTYPE html>
		<html lang="ru">
		<head>
		  <meta charset="utf-8">

		  <title>timeline</title>
		  <link rel="stylesheet" href="css/style_timeline.css">
		</head>';

		$content= "";

		// TO-Do Получить данные из файла в диапазоне $_POST['dt_start'] $_POST['dt_end']
		for ($j = 0; $j <= count($_DATE) -1; $j++){
			
			if ($file = file_get_contents('./tmpl/'.$_DATE[$j].'.txt',FILE_USE_INCLUDE_PATH )){
				$arrTextOfFile = explode(";", $file);
				$mass[] = array("date" => $arrTextOfFile[0], "header" => $arrTextOfFile[1], "desc" => $arrTextOfFile[2]);
			} else {
				$mass[] = array("date" => "$_DATE[$j]", "header" => "...", "desc" => "На выбранную дату события в справочнике нет.. =(");
			}
			error_reporting( E_ERROR ); //скрыть отключение предупреждений warning
		}

		$body = "<body><div id=content>";
		$contener = "";

		$content = genFeed( $mass);
		
		$contener = $body.$content."</div></body>";

		$html = $header.$contener.'</html>';
		return $html;
	}

	//error_reporting( E_ERROR ); //скрыть отключение предупреждений warning
	echo generateHTML($_DATE);