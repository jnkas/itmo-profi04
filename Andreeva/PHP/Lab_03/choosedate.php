<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Calendar</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="eventCalendar">
        <div class="dateList">
            <h3>>>> Выберите дату >>>    </h3>
            <?php
                //определяем текуший месяц
                if(isset($_GET['month'])) 
                    $month = $_GET['month'];
                else 
                    $month = date('m');//текуший месяц
                //определяем текущий год
                if(isset($_GET['year'])) 
                    $year = $_GET['year'];
                else 
                    $year = date('Y');//текущий год
            
                $self = $_SERVER['PHP_SELF'];// местоположение скрипта
                
                //выбор месяца и года
                $months = array('Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь');
            
                echo "<form action='$self' method='get'><select name='month'>";
            
                for($i=0; $i<=11; $i++) {
                    echo "<option value='".($i+1)."'";
                    if($month == $i+1) 
                        echo "selected = 'selected'";
                    echo ">".$months[$i]."</option>";
                }
            
                echo "</select>";
            
            
                //скрытый тег передает значение выбранной ранее даты
                echo "</select><select name='dt' style='display: none;'><option value='".$_GET['dt']."' selected></option></select>";
            
                echo "<select name='year'>";
            
                for($i="2000"; $i<=(date('Y')+5); $i++){
                    $selected = ($year == $i ? "selected = 'selected'" : '');
                    echo "<option value=\"".($i)."\"$selected>".$i."</option>";
                }
            
                echo "</select><input type='submit' value='Посмотреть' /></form>"; 
                // Вывод списка дат выбранных месяца и года
                $daysOfMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
            
                for ($i=1;$i<=$daysOfMonth;$i++) {
                    $mkTime = mktime(0,0,0,$month,$i,$year);
                    $date = date('d.m.Y', $mkTime);
                    echo '<a href="choosedate.php?dt='.$date.'"><span class="choosedate">'.$date.'</span></a><br>';
                    
                    error_reporting( E_ERROR ); //отключить протоколирование ошибок
                };
            
                $tmpl = file_get_contents('./tmpl/'.$_GET['dt'].'.txt', FILE_USE_INCLUDE_PATH);
                $arrText = explode(";", $tmpl);
            ?>
        </div>
        <div class="content">
           <h1>Календарь событий</h1>
               <div>
                   <h2>Дата</h2>
                   <p id="eventDate">
                      <?php echo $arrText[0];
                       ?>
                   </p>
               </div>
               <div>
                   <h2>Событие</h2>
                   <p id="eventName">
                      <?php echo $arrText[1];
                       ?>
                   </p>
               </div>
               <div id="eventImg">
                  <?php echo '<img src="img/'.$arrText[0].'.jpg" width=300>';
                   ?>
               </div>
               <div class="desc" id="eventDesc">
                  <?php echo $arrText[2];
                   ?>
               </div>
        </div>
    </div>
</body>
</html>