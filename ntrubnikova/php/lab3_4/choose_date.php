<?php 

//Header
$header= '
	<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Выбрать дату</title>
            <link rel="stylesheet" href="css/calendar.css">
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
    $feed = '<div id="feed"><table>';
    
    $from = new DateTime($_POST['from']);
    $to = new DateTime($_POST['to']);
    $to -> modify('+1 day');
    $interval = DateInterval::createFromDateString('1 day');
    $period = new DatePeriod($from, $interval, $to);
    
    if (strtotime($_POST['to']) - strtotime($_POST['from']) > 0) { 
        $array = [];
        $counter = 0;

        foreach ($period as $date) {
            $fileName = $date -> format("d.m.Y");
            //var_dump ($fileName);
            $file = 'tmpl/'. $fileName.'.txt';
            $img = '<img src="img/'. $fileName.'.png">';

            $info = file_get_contents($file,FILE_USE_INCLUDE_PATH);
            $event =  explode(";",$info);
            $keys = array('date','title','description');
            $combined = array_combine($keys,$event);
            array_push($array, $combined);
            $feed .= '<tr><td>'. $img. '</td><td id="feed-date">'. $array[$counter]['date']. '</td><td id="feed-title">'. $array[$counter]['title']. '</td><td id="feed-description">'. $array[$counter]['description']. '</td></tr>';
            $counter ++;
        }
    }
  
    $feed .= '</table></div>';
};

//Календарь
function drawCalendarDays(){
        //Календарь
        $daysUlHtml = '<ul class="days">';
        for ($i = 1; $i <= 31; $i++) {
            if ($i < 10) {
                $day = '0'. $i;
            }
            else {
                $day = $i;
            }
          $daysUlHtml .= '<li><a href="index.php?dt='. $day. '.12.2017">'. $i. '</a></li>';
        }  
        $daysUlHtml .= '</ul>';
        return $daysUlHtml;
    };

$daysUl = drawCalendarDays();
$body = "<body><div id=\"calendar-box\">";
$calendar='
    <div class="month"> 
        <ul>
            <li>Декабрь<br><span style="font-size:18px">2017</span></li>
        </ul>
    </div>';
    
//Общее
	$html = $header. $body. $calendar. $daysUl. '</div>'. $form. $feed. '</body></html>';
	
echo $html;

?>









