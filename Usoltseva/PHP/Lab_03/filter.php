<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>События календаря</title>
    <link rel="stylesheet" href="css/style.css">

</head>

<body>


<body>


<?php


$filtered = scandir('tmpl');
$output = '';


if ($_GET['date_from'] !== "" && $_GET['date_to'] !== "") {
    
    $min_date = strtotime($_GET['date_from']);
    $max_date = strtotime($_GET['date_to']);
    
    if ($min_date <= $max_date) {
        foreach ($filtered as $file) {
            if ($file === "." || $file === "..") {
                continue;
            }
            $files_array = explode(".", $file);
           
            $curr_date = mktime(0,0,0,$files_array[1],$files_array[0],$files_array[2]);
            if ($min_date <= $curr_date && $curr_date <= $max_date) {
                $arr = explode(";", file_get_contents("tmpl/$file",FILE_USE_INCLUDE_PATH));
                $output = $output.'<div class="list"><h1>Событие: ' . $arr[0] . '</h1><h2>' . $arr[1] . '</h2><img src=' . $arr[3] . '><p>' . $arr[2] . '</p></div>';
                
            }
        }
    } 
} else {
    $output = "<p>Даты не выбраны</p>";
}

echo $output . '<br><a href="index.php">Вернуться к календарю</a>';

?>

</body>

</html>