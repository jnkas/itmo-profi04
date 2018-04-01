<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <title>php_lab01_calendar</title>
    
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style_timeline.css">
    
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/app.js"></script>
    <script src="js/mustache.js"></script>

</head>

<body>
    <div id="dayCalendar">
        <aside class="admin_button">
          <a href="../admin/admin.php"><button class="to_admin">Добавить событие</button></a>
          
        </aside>
        <!-- Список дат: -->
        <aside class="sidebar">
            <p>Выберите другую дату:</p>
            
            <?php
            
            //задаем переменные: текущий месяц, и текущий год
                //проверяем переменная со значением месяца была установлена в URL-адресе?
                //в ином случае, используем функцию date(), чтобы установить текущий месяц.
                if(isset($_GET['month'])) 
                    $month = $_GET['month'];
                elseif(isset($_GET['viewmonth'])) 
                    $month = $_GET['viewmonth'];
                else 
                    $month = date('m');//текуший месяц

                //проверяем переменная со значением года была установлена в URL-адресе?
                //в ином случае, используем функцию date(), чтобы установить текущий год.
                if(isset($_GET['year'])) 
                    $year = $_GET['year'];
                elseif(isset($_GET['viewyear'])) 
                    $year = $_GET['viewyear'];
                else 
                    $year = date('Y');//текущий год
            
            
            //Переключение на другой месяц/год.
           
                //$self = $_SERVER['PHP_SELF'];  // местоположение скрипта
            
                $months = array('Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь');

                echo "<form action='index.php' method='get' class='choose_date'><select name='month'>";

                for($i=0; $i<=11; $i++) {
                    echo "<option value='".($i+1)."'";
                    if($month == $i+1) 
                        echo "selected = 'selected'";
                    echo ">".$months[$i]."</option>";
                }

                echo "</select>";
                echo "<select name='year'>";

                for($i="1970"; $i<=(date('Y')+20); $i++){
                    
                    $selected = ($year == $i ? "selected = 'selected'" : '');

                    echo "<option value=\"".($i)."\"$selected>".$i."</option>";
                }

                echo "</select><input type='submit' value='смотреть' /></form>";    

            
            //Выводим список дат:
            
                $num = cal_days_in_month(CAL_GREGORIAN, $month, $year);//количество дней в месяце

                for($i=1;$i<=$num;$i++){
                    $mktime=mktime(0,0,0,$month,$i,$year);
                    $date=date('d.m.Y',$mktime);
                    echo '<a href="choosendate.php?dt='.$date.'">'.$date.'</a><br>';
                };
                

            ?>
            
            
        </aside>
        
        <div class="content">
           
			<div class="top">
				<h1>Календарь событий</h1>
				<div class="date_range">
					<span>Выберите диапазон дат:</span>
					<form action="timeline.php" method="POST">
						<p>
							<label for="firstDate">От:</label>
							<input type="date" name="firstDate" id="firstDate">
							<label for="lastDate">До:</label>
							<input type="date" name="lastDate" id="lastDate">
							<!-- <input type="submit" value="Показать" id="submit"> -->
							<button type="button" id="btn">Показать</button>
						</p>
                    </form>
				</div>
			</div>
            
				<div id="msgTimeline">
					<div class="row">
						<div class="date">
							<span class="heads">Сегодня:</span>
							<h2 id="logDate"><!--Здесь выводим..Дату--></h2>
						</div>
						
						<div class="header">
							<span class="heads">Событие:</span>
							<h2 id="logHeader"><!--Здесь выводим..Заголовок события--></h2>
						</div>
					</div>	
					
					<div id="logImg"><!--Здесь выводим..Картинку--></div>

					<div class="desc">
						<p id="logDesc"><!--Здесь выводим..Описание события --></p>
					</div>
				</div>
        </div>

    </div>
 <!--
 <script>
 		function click(idName) {
		
			var element = document.getElementById(idName);
			
			function changeColor() {
				
				if(element.style.backgroundColor === 'green'){ //сначала задаем условие для green, иначе цвет поменяется на зеленый только со второго щелчка
					element.style.backgroundColor = 'orange';
				} else {
					element.style.backgroundColor = 'green';
				}

			}
			
			element.onclick = changeColor;	
		}
	
		click('btn');
 </script>
 -->
<script src="js/timeline.js"></script>
</body>

</html>