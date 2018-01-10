<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>События календаря</title>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/app.js"></script>
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <main>
        <div id="event">События календаря</div>
        <div class="calendar"></div>
<?php
function drawCalendar() {
    $dec_2017 = '.12.2017';
    $december = ' декабря';
    $caption = 'Дата события';
    $table = '<table><caption>' . $caption . '</caption><tr>';

    for($temp = 1; $temp <= 31; $temp++) {
        $day = ($temp < 10)?'0'.$temp : $temp;
        $table .= '<td><a href="page.php?dt=' . $day . $dec_2017 . '">' . $temp . '</a></td>'; 
        if ($temp % 7 === 0) {
            $table .= '</tr><tr>';
        };

    };    
    $table .= '</tr></table>';
    echo $table;
};

drawCalendar(); 

?>
        </main>
        <footer>
           <button><a href="admin.php">Добавить событие</a></button>
           <br>
           <br>
            <form action="filter.php" method="GET">Лента событий
                    <label for="first_date">Выберите начало диапазона</label>
                    <input type="date" name="date_from" id="first_date">
                    <label for="second_date">Выберите конец диапазона</label>
                    <input type="date" name="date_to" id="second_date">
                    <br>
                    <button type="submit">Показать ленту</button>
            </form>
        </footer>
</body>

</html>
