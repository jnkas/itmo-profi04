<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>my-calendar.ru</title>
    <script src="js/jquery-3.2.1.min.js"></script>
    <!--    <script src="js/app.js"></script>-->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    
    <main>
        
        <div id="day-calendar" class="page">
<?php
    
    function createDayEvent() {
        $this_date = $_GET['dt'];
        $date_arr = explode('.', $this_date);
        /*
        echo "<pre>";
        print_r($date_arr);
        echo "</pre>";
        */
        
        
        $months = [1 => 'Января', 'Февраля', 'Марта', 'Апреля', 'Мая', 'Июня', 'Июля', 'Августа', 'Сентября', 'Октября', 'Ноября', 'Декабря'];
        
        $file_src = 'tmpl/'.$this_date.'.txt';
        $file_str = file_get_contents($file_src, FILE_USE_INCLUDE_PATH);
        $file_str_arr = explode(';', $file_str);
        
        $output_str = '<h1>Событие: ' . $date_arr[0] . ' ' . $months[$date_arr[1]] . '</h1><h2>' . $file_str_arr[1] . '</h2><img src=' . $file_str_arr[3] . '><p>' . $file_str_arr[2] . '</p>';
        
        
        echo '<a href="index.php">Вернуться к календарю</a><br><br>';
        echo $output_str;
    };
    createDayEvent();
    
?>
    </div>
        
    </main>
    

</body>

</html>

