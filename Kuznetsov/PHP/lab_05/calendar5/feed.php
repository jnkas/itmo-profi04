<?php

$from_date = explode('-', $_POST['date_from']);
$to_date = explode('-', $_POST['date_to']);
$content_dir = scandir('tmpl');
$output_string = '';


if ($_POST['date_from'] !== "" && $_POST['date_to'] !== "") {
    
    $min_date = strtotime($_POST['date_from']);
    $max_date = strtotime($_POST['date_to']);
    
    if ($min_date <= $max_date) {
        
        $must_arr = [];
        
        foreach ($content_dir as $file) {
            if ($file === "." || $file === "..") {
                continue;
            }
            $arr_files = explode(".", $file);
            $curr_date = mktime(0,0,0,$arr_files[1],$arr_files[0],$arr_files[2]);
            if ($min_date <= $curr_date && $curr_date <= $max_date) {
                $curr_file = file_get_contents("tmpl/$file",FILE_USE_INCLUDE_PATH);
                $arr = explode(";", $curr_file);
                $output_string = $output_string.'<div class="list"><h1>Событие: ' . $arr[0] . '</h1><h2>' . $arr[1] . '</h2><img src=' . $arr[3] . '><p>' . $arr[2] . '</p></div><hr>';
                
                $keys = ['event','title','desc','img'];
                $combined = array_combine($keys, $arr);
                array_push($must_arr, $combined);
            }
        }
    } else {
        $output_string = "<p>Дата начала периода не может быть больше даты конца периода!</p>";
    }
} else {
    $output_string = "<p>Не выбрана ни одна из дат!</p>";
}

//echo '<a href="index.php">Вернуться к календарю</a><br><br>';
echo json_encode($must_arr);
//echo '<a href="index.php">Вернуться к календарю</a>';

?>
