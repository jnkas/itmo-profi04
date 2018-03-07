<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>my-calendar.ru</title>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/mustache.js"></script>
    <script src="js/app.js"></script>
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <main id="main_page">
        <div id="day-calendar"></div>

        <div class="cal_table">

<?php
// пока генерирует только на декабрь
function generateTable() {
    $dec_2017 = '.12.2017';
    $december = ' декабря';
    
    $caption = 'Дата события';
    $table = '<table><caption>' . $caption . '</caption><tr>';

    for($i = 1; $i <= 31; $i++) {
        $n = ($i < 10)?'0'.$i : $i;

        $table .= '<td data-date="' . $n . $dec_2017 . '">' . $i . '</td>';
        if ($i % 7 === 0) {
            $table .= '</tr><tr>';
        };

    };    
    $table .= '</tr></table>';
    echo $table;
};
generateTable(); 
?>
            <br>
            <br>
            <div id="feed_list">
                <label for="first_date">Выберите дату начала</label>
                <input type="date" name="date_from" id="first_date">
                <label for="second_date">Выберите дату конца</label>
                <input type="date" name="date_to" id="second_date">
                <br>
                <br>
                <button>Показать ленту</button>
            </div>

        </div>

    </main>

</body>

</html>
