<?php 

//Header
$header= '
	<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Выбрать дату</title>
            <link rel="stylesheet" href="css/calendar.css">
            <script src="js/jquery.min.js"></script>
        </head>
    ';
    
//Форма
$form = '
        <div id="filter">
        <form method="post">
            <h2>Показать события</h2>
            <p>С </p>
            <input type="date" name="from">
            <p>До</p>
            <input type="date" name="to"></br>
            <button type="submit">Показать ленту</button>
            <button type="reset">Сбросить</button>
        </form>
        </div>
    ';
    
//Лента

if (!empty($_POST['from']) && !empty($_POST['to'])) {
    
    
    $from = new DateTime($_POST['from']);
    $to = new DateTime($_POST['to']);
    $to -> modify('+1 day');
    $interval = DateInterval::createFromDateString('1 day');
    $period = new DatePeriod($from, $interval, $to);
    
    $feed = '<div id="feed"><div id="events-range">Cобытия с '. date_format($from, 'd.m.Y'). ' по '. date_format($to -> modify('-1 day'), 'd.m.Y'). '</div><table>';
    
    if (strtotime($_POST['to']) - strtotime($_POST['from']) >= 0) { 
        $array = [];

        foreach ($period as $date) {
            $fileName = $date -> format("d.m.Y");
            //var_dump ($fileName);
            $file = 'tmpl/'. $fileName.'.txt';
            $img = '<img src="img/'. $fileName.'.png">';

            $info = file_get_contents($file,FILE_USE_INCLUDE_PATH);
            $event =  explode(";",$info);
            array_push($event, $img);
            $keys = array('date','title','description','image');
            $combined = array_combine($keys,$event);
            array_unshift($array, $combined);
        }
        
        $counter = 0;
        foreach ($array as $value) {
            $feed .= '<tr><td>'. $array[$counter]['image']. '</td><td id="feed-date">'. $array[$counter]['date']. '</td><td id="feed-title">'. $array[$counter]['title']. '</td><td id="feed-description">'. $array[$counter]['description']. '</td></tr>';
            $counter ++;
        }
    }
  
    $feed .= '</table></div>';
};

//Календарь
$body = '<body><div id="calendar-box">
    <div class="month"> 
           <form method="post">
               <div id="month-name" class="12">
               <select name="choose-month" class="choose-month" id="choose-month">
                       <option value="00">Месяц</option>
                       <option value="01">Январь</option>
                       <option value="02" >Февраль</option>
                       <option value="03">Март</option>
                       <option value="04">Апрель</option>
                       <option value="05">Май</option>
                       <option value="06">Июнь</option>
                       <option value="07">Июль</option>
                       <option value="08">Август</option>
                       <option value="09">Сентябрь</option>
                       <option value="10">Октябрь</option>
                       <option value="11">Ноябрь</option>
                       <option value="12">Декабрь</option>
                   </select>
                   <select name="choose-year"  class="choose-year">
                       <option value="2017">Год</option>
                       <option value="2017">2017</option>
                       <option value="2018">2018</option>
                       <option value="2019">2019</option>
                       <option value="2020">2020</option>
                       <option value="2021">2020</option>
                       <option value="2022">2020</option>
                    </select>
                    <button type="submit" class="set-date">>></button>
            </div>
        </form>
    </div>';

function drawCalendarDays(){
    $months = array ('01'=>'Январь', '02'=>'Февраль', '03'=>'Март', '04'=>'Апрель', '05'=>'Май', '06'=>'Июнь', '07'=>'Июль', '08'=>'Август', '09'=>'Сентябрь', '10'=>'Октябрь', '11'=>'Ноябрь', '12'=>'Декабрь');
    
    $currentMonth = $months[$_POST['choose-month']];
    
    $daysUlHtml = '<div id="current-month-year">'. $currentMonth. ' '. $_POST['choose-year']. '</div><ul class="days">';
    $month = $_POST['choose-month'];
    $year = $_POST['choose-year'];
    
    if (!empty($_POST['choose-month']) && !empty($_POST['choose-year'])) {
        if (in_array($_POST['choose-month'], array('01', '03', '05','07','08','10','12'), true)) {
            $endMonth = 31;
        }
        else if (($_POST['choose-month']) == '02') {
            $endMonth = 28;
        }
        else {
            $endMonth = 30;
        }
        for ($i = 1; $i <= $endMonth; $i++) {
            if ($i < 10) {
                $day = '0'. $i;
            }
            else {
                $day = $i;
            }
          $daysUlHtml .= '<li><a href="index.php?dt='. $day. '.'. $month. '.'. $year. '">'. $i. '</a></li>';
        }  
        $daysUlHtml .= '</ul>';
        return $daysUlHtml;
    }
};

$daysUl = drawCalendarDays();


//Общее
	$html = $header. $body. $calendar. $daysUl. '</div>'. $form. $feed. $script. '</body>'. '</html>';
	
echo $html;

?>









