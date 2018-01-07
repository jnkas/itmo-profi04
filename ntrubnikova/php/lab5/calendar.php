<?php 
header('Content-Type: text/html; charset=utf-8');

$from = new DateTime($_POST['fromDate']);
$to = new DateTime($_POST['toDate']);
$to -> modify('+1 day');
$interval = DateInterval::createFromDateString('1 day');
$period = new DatePeriod($from, $interval, $to);
 

if (strtotime($_POST['to']) - strtotime($_POST['from']) >= 0) {
    $array = [];
    
    foreach ($period as $date) {
        $fileName = $date -> format("d.m.Y");
        $file = 'tmpl/'. $fileName.'.txt';
        $img = 'img/'.$fileName.'.png';

        $info = file_get_contents($file,FILE_USE_INCLUDE_PATH);
        $event =  explode(";",$info);
        array_push($event, $img);
        $keys = array('date','title','description','image');
        $combined = array_combine($keys,$event);
        array_unshift($array, $combined);
    }
    
}

echo json_encode($array, JSON_UNESCAPED_UNICODE);
?>

