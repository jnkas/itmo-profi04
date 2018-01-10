<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>События календаря</title>
    <script src="js/jquery-3.2.1.min.js"></script>
    <!--    <script src="js/app.js"></script>-->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <div style="margin-bottom: 20px"><a href="index.php">Вернуться к календарю</a></div>
    
        
        <div id="event" >
<?php
    
    function showEvent() {
        $chosen_date = $_GET['dt'];
        $date_arr = explode('.', $chosen_date);
        
        
        $months = [1 => 'Января', 'Февраля', 'Марта', 'Апреля', 'Мая', 'Июня', 'Июля', 'Августа', 'Сентября', 'Октября', 'Ноября', 'Декабря'];
        $filesArr = explode(';', file_get_contents('tmpl/'.$chosen_date.'.txt', FILE_USE_INCLUDE_PATH));
        
        $output = '<div id="event"><div id="eventDate"><h1>' . $date_arr[0] . ' ' . $months[$date_arr[1]] . '</h1></div><div id="content"><h2>' . $filesArr[1] . '</h2><p><img src=' . $filesArr[3] . '><p>' . $filesArr[2] . '</p></div></div>';
        
        //  если картинки нет, то выдается ошибка - Undefined offset 3 на стр 36
        echo $output;
    };
    showEvent();
    
?>
    </div>
    
    

</body>

</html>

