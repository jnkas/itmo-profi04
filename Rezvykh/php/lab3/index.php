<?php
if (isset($_COOKIE['calDayFrom'])) {
	$calDayFrom = $_COOKIE['calDayFrom'];
} else {
	setcookie('calDayFrom', date("Y-m-d"));
	$calDayFrom = $_COOKIE['calDayFrom'];
}
if (isset($_COOKIE['calDayTo'])) {
	$calDayTo = $_COOKIE['calDayTo'];
} else {
	$calDayTo = "";
}
function calendar($month, $year) {
	$m = intval($month);
	$y = intval($year);
	$filePath = "tmpl/";
	$countDays = cal_days_in_month(CAL_GREGORIAN, $m, $y);
	$firstDay = "01.$m.$y";
	$lastDay = "$countDays.$m.$y";
	$firstWeek = date("W", strtotime($firstDay));
	$dayOfWeek = date("w", strtotime($firstDay)); 
	$lastWeek = date("W", strtotime($lastDay));

	$d = 1;
	$daystart = 0;

	if ($dayOfWeek == 0) {$dayOfWeek = 7;}
	for ($i = $firstWeek; $i <= $lastWeek; $i++) {
		$arrRow = array();
		for ($j = 1; $j <= 7; $j++) {
			if ($j < $dayOfWeek && $daystart == 0) {
				array_push($arrRow, " ");
			} else {
				$daystart = 1;
				if ($d <= $countDays) {
					array_push($arrRow, $d);
				} else {
					array_push($arrRow, " ");
				}
				$d++;
			}
		}
		$arrDays[$i] = $arrRow;
	}

	$calendarRows = "";
	for ($i = $firstWeek;  $i <= $lastWeek; $i++) {
		$calendarRows .= "<tr><td><small class='text-muted'>$i<small></td>";
		for ($j = 0; $j <= 6; $j++) {

			$date1 = str_pad($arrDays[$i][$j], 2, "0", STR_PAD_LEFT);

			$fileName = $y . "-" . $m . "-" . $date1 . '.txt';
			$fileFullPath = $filePath . $fileName;

			if (file_exists($fileFullPath)) {
				$printDate = "<a class='calday' href='#' data-date='" . $y . '-' . $m . '-' . $arrDays[$i][$j] . "'>" . $arrDays[$i][$j] . "</a>";
			} else {
				$printDate = $arrDays[$i][$j];
			}

			$calendarRows .= "<td>" . $printDate .  "</td>";
		}
		$calendarRows .= "</tr>";
	}

	$calendarHead = "
	<table class='table'>
		<thead>
			<tr>
				<th scope='col'>#</th>
				<th scope='col'>Пн</th>
				<th scope='col'>Вт</th>
				<th scope='col'>Ср</th>
				<th scope='col'>Чт</th>
				<th scope='col'>Пт</th>
				<th scope='col'>Сб</th>
				<th scope='col'>Вс</th>
			</tr>
		</thead>
		<tbody>";

	$calendar = "";
	$calendar .= $calendarHead . $calendarRows . "</tbody></table>";
	return $calendar;
}

function calendarControl($month, $year) {
	$cc = "<div><form action='' method='POST'><select class='custom-select' name='cMonth'>";

	$ccMonth = array("01" => "Январь", "02" => "Февраль", "03" => "Март", "04" => "Апрель", "05" => "Май", "06" => "Июнь", "07" => "Июль", "08" => "Август", "09" => "Сентябрь", "10" => "Октябрь", "11" => "Ноябрь", "12" => "Декабрь");
	$ccYear = array(2016, 2017, 2018);

	foreach ($ccMonth as $key => $value) {
		if ($key == $month) {
			$selectedM = " selected";
		} else {
			$selectedM = "";
		}
		$cc .= "<option value='$key' $selectedM>$value</option>";
	}
	$cc .= "</select><select class='custom-select' name='cYear'>";

	foreach ($ccYear as $value) {
		if ($value == $year) {
			$selectedY = " selected";
		} else {
			$selectedY = "";
		}
		$cc .= "<option value='$value' $selectedY>$value</option>";
	}
	$cc .= "</select><button type='submit' class='btn btn-primary'>Выбрать</button></form><input type='hidden' id='cMonth' value='$month'><input type='hidden' id='cYear' value='$year'></div>";
	return $cc;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Научный календарь</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class='container'>
		<nav class='navbar navbar-expand-lg navbar-light bg-light'>
			<a class='navbar-brand' href='#'>Календарь</a>
			<button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNavDropdown' aria-controls='navbarNavDropdown' aria-expanded='false' aria-label='Toggle navigation'>
				<span class='navbar-toggler-icon'></span>
			</button>
			<div class='collapse navbar-collapse' id='navbarNavDropdown'>
				<ul class='navbar-nav mr-auto'>
					<li class='nav-item'>
						<a class='nav-link' href='admin/'>Админка</a>
					</li>
				</ul>
				<span>
				<?php 
				session_start();
				if (isset($_SESSION['auth']) and $_SESSION['auth'] == true) {
	      		echo "Привет, " . $_SESSION['username'] . " | <a href='admin/logout.php'>Выход</a>";
	      		} else { echo "<a href='admin/index.php'>Вход</a>";}
	      		?>
	      	</span>
			</div>
		</nav>
	</div>
	<div class="container">
		<header>
			<h1>Научный календарь</h1>
			<div class="form-group  form-control-md">
				<label>Фильтр мероприятий:</label>
				<div class="row">
					
				<?php echo "
				<div class='col-lg-3'><input id='calinput' class='form-control col' type='date' name='calendar' value='$calDayFrom'></div>
				<div class='col-lg-3'><input id='calinputTo' class='form-control col' type='date' name='calendarTo' value='$calDayTo'></div>
				<input type='hidden' id='calDayFrom' value='$calDayFrom'>
				<input type='hidden' id='calDayTo' value='$calDayTo'>"
				;?>
				</div>

			</div>
		</header>
		<div class="row">
			<main class="col-8">
				<div id="events"></div>
			</main>
			<aside class="col-4">
				<div class="row">
					<h5>Календарь мероприятий:</h5>
					<?php 
					if (isset($_POST['cMonth'])) {
						$cMonth = $_POST['cMonth'];
						setcookie('cMonth', $cMonth);
					} else {
						if(isset($_COOKIE['cMonth'])) {
							$cMonth = $_COOKIE['cMonth'];
						} else {
							$cMonth = date("m");
						}
					}
					if (isset($_POST['cYear'])) {
						$cYear = $_POST['cYear'];
						setcookie('cYear', $cYear);
					} else {
						if (isset($_COOKIE['cYear'])) {
							$cYear = $_COOKIE['cYear'];
						} else {
							$cYear = date("Y");
						}
					}
					echo calendarControl($cMonth, $cYear);
					echo calendar($cMonth, $cYear); ?>
				</div>
			</aside>
		</div>
	</div>
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type='text/javascript' src='js/popper.min.js'></script>
	<script type='text/javascript' src='js/bootstrap.min.js'></script>
	<script type="text/javascript" src="js/app.js"></script>
</body>
</html>