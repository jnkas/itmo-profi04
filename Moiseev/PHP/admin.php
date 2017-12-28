
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <?php
    echo '<form action="handler.php" method="POST">
        <fieldset>
            <legend>Заполните поля для внесения информации в базу</legend>
            
            <label for="my_date">Выберите дату</label>
            <input type="date" name="date" id="my_date">
            
            <label for="my_header">Введите заголовок события</label>
            <input type="text" name="header" id="my_header">
            
            <label for="my_desc">Введите описание события</label>
            <textarea name="desc" id="my_desc"></textarea>
            
            <input type="submit" value="Отправить">
        </fieldset>
    </form>';
    
    ?>
    <?php
//    Функция генерации календаря
function draw_calendar($month,$year){
//  Начало таблицы
  $calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';
//  Заглавия в таблице
  $headings = array('Понедельник','Вторник','Среда','Четверг','Пятница','Субота','Воскресенье');
  $calendar.= '<tr class="calendar-row"><td class="calendar-day-head">'.implode('</td><td class="calendar-day-head">',$headings).'</td></tr>';
//дни,недели
  $running_day = date('w',mktime(0,0,0,$month,1,$year));
  if($running_day == 0){
$running_day = $running_day 6;
}else{
$running_day = $running_day - 1;
      if($running_day == -1) $running_day = 6;

}
    
  $days_in_month = date('t',mktime(0,0,0,$month,1,$year));
  $days_in_this_week = 1;
  $day_counter = 0;
  $dates_array = array();
//  первая строка календаря
  $calendar.= '<tr class="calendar-row">';
//  вывод пустых ячеек в сетке календаря
  for($x = 0; $x < $running_day; $x++):
    $calendar.= '<td class="calendar-day-np"> </td>';
    $days_in_this_week++;
  endfor;
//  запись чисел в первую строку
  for($list_day = 1; $list_day <= $days_in_month; $list_day++):
    $calendar.= '<td class="calendar-day">';
//    Пишем номер в ячейку
      $calendar.= '<div class="day-number">'.$list_day.'</div>';
//     Можно сделать запрос
$running_date = $year.'-'.$month.'-'.$running_day;
$query = mysql_query("SELECT * FROM events WHERE date = '$running_date' ");
while($result = mysql_fetch_assoc($query))
{
$calendar.= '<p>'.$result['event_name'].'</p>';
}
      $calendar.= str_repeat('<p> </p>',2);
      
    $calendar.= '</td>';
    if($running_day == 6):
      $calendar.= '</tr>';
      if(($day_counter+1) != $days_in_month):
        $calendar.= '<tr class="calendar-row">';
      endif;
      $running_day = -1;
      $days_in_this_week = 0;
    endif;
    $days_in_this_week++; $running_day++; $day_counter++;
  endfor;
//  Выводим пустые ячейки в конце последней недели
  if($days_in_this_week < 8):
    for($x = 1; $x <= (8 - $days_in_this_week); $x++):
      $calendar.= '<td class="calendar-day-np"> </td>';
    endfor;
  endif;
//  Закрываем последнюю строку
  $calendar.= '</tr>';
//  Закрываем таблицу
  $calendar.= '</table>';
  
//  возвращаем результат
  return $calendar;
}
echo '<h2>Февраль 2017</h2>';
echo draw_calendar(02,2017);
 ?>
</body>

</html>

