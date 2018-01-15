<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Calendar</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/app.js"></script>
</head>
<body>
    <div id="eventCalendar">
        <div class="dateList">
            <h3>>>> Выберите дату >>></h3>
            <?php
                //определяем текуший месяц
                if(isset($_GET['month'])) 
                    $month = $_GET['month'];
                else 
                    $month = date('m');
                // определяем текущий год
                if(isset($_GET['year'])) 
                    $year = $_GET['year'];
                else 
                    $year = date('Y');
                
                //выбор месяца и года
                $months = array('Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь');
            
                echo "<form action='index.php' method='get'><select name='month'>";
            
                for($i=0; $i<=11; $i++) {
                    echo "<option value='".($i+1)."'";
                    if($month == $i+1) 
                        echo "selected = 'selected'";
                    echo ">".$months[$i]."</option>";
                }
            
                echo "</select>";
            
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
                };
            ?>
        </div>
        <div class="content">
            <h1>Календарь событий</h1>
            <div class="eventline">
                <h3>>>> Фильтр. Выберите временной срез для отображения событий >>></h3>
                <div class="filter">
                    <form action="eventline.php" method="POST">
                        <label for="dateFrom">Дата начала</label>
                        <input type="date" name="dateFrom" id="dateFrom">
                        <label for="dateTo">Дата окончания</label>
                        <input type="date" name="dateTo" id="dateTo">
                        <button type="button" id="runEventline">Посмотреть</button>
                    </form>
                </div>
            </div>
            <div id="msgTimeline">
                <h3>>>> Событие дня >>></h3>
                <div>
                    <h2>Дата</h2>
                    <p id="eventDate"></p>
                </div>
                <div>
                    <h2>Событие</h2>
                    <p id="eventName"></p>
                </div>
                <div id="eventImg"></div>
                <div class="desc" id="eventDesc"></div>
            </div>
            
        </div>
     </div>
<script src="js/eventline.js"></script>
</body>
</html>