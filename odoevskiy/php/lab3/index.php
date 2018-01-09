<?php
echo '
<meta charset="utf-8">
<style>
	#inp{
		background: white;
		border: 1px solid gray;
		padding: 3.5px;
		}
	#filter,
	#filter1 {
		text-align: center;
		padding: 10px;
		}
	#filter1 {
		border-bottom: 1px solid gray;
		}
</style>
<div id="filter">
	<p>Выбрать одну дату<p>
	<form action="index.php" method="get">
	<input type="date" name="date">
	<input id="inp" type="submit" name="choose_button" value="Выбрать"><br>
</div>
<div id="filter1">
	<p>или период<p>
	<span>от</span>
	<input type="date" name="from_date">
	<span>до</span>
	<input type="date" name="to_date">
	<input id="inp" type="submit" name="choose_button" value="Выбрать">
</div>
</form>';

$date = $_GET['date'];
$from_date = $_GET['from_date'];
$to_date = $_GET['to_date'];

if($date == true) {
	$content = file_get_contents('tmpl/'.$date.'.txt');
	$slice_date = explode("-", $date);
	$content_date = $slice_date[2].".".$slice_date[1].".".$slice_date[0];
	$slice_content = explode(";", $content);

	$print_content = '
		<meta charset="utf-8">
		<style>
		#button {
		    text-align: center;
			}
		a {
			color: gray;
			text-decoration: none;
			border: 1px solid gray;
			padding: 5px 10px;
			}	
		#date {
			text-align: center;
			border-bottom: 1px solid gray;
			padding: 20px;
			}
		#event {
			text-align: center;
			padding: 20px;
			font-size: 25px;
			}
		#subscribe {
			text-align: center;
			border-bottom: 1px solid gray;
			padding: 25px;
			}
		</style>
			<div id="calendar">
				<div id="date">'.$content_date.'</div>
				<div id="event">'.$slice_content[1].'</div>
				<div id="subscribe">'.$slice_content[2].'</div>
			</div>';
	
	echo $print_content.'<br><div id="button"><a href="index.php">Назад</div>';
	
} elseif ($from_date == true and $to_date == true) {
	
	$day_interval = (strtotime($to_date) - strtotime($from_date)) / 86400; // разница между двумя датами, для цикла.
	$str_day = strtotime($from_date); // преобразование даты начала в UNIX формат, для прибавления милисекунд.
	
	for($i = 0; $i <= $day_interval; $i++) {
		$day_arr[$i] = $str_day;
		$str_day += 86400;
	};
	
	foreach($day_arr as $key => $value) {
		$content = file_get_contents('tmpl/'.date('Y-m-d', $value).'.txt');
		$exp_content = explode(";", $content);
		$print_list .= '
		<meta charset="utf-8">
		<style>
		#button {
		    text-align: center;
			}
		a {
			color: gray;
			text-decoration: none;
			border: 1px solid gray;
			padding: 5px 10px;
			}	
		#list {
			border-bottom: 1px solid gray;
			padding: 20px;
			}
		#date,
		#subscribe,
		#event{
			padding-bottom: 10px;
			}
		</style>
			<div id="list">
				<div id="date">'.$exp_content[0].'</div>
				<div id="event">'.$exp_content[1].'</div>
				<div id="subscribe">'.$exp_content[2].'</div>
			</div>';
	};
	echo $print_list.'<br><div id="button"><a href="index.php">Очистить</div>';
}
?>