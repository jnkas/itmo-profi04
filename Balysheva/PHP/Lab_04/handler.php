<html>

<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<?php
$date = $_POST["date"];
$arr = explode("-", $date);
$currDate = $arr[2].".".$arr[1].".".$arr[0];
$header = $_POST["header"];
$desc = $_POST["desc"];
$img = $currDate . ".jpg";
$str = $currDate.";".$header.";".$desc.";img/".$img;
$writing = file_put_contents("tplt/".$currDate.".txt", $str, FILE_USE_INCLUDE_PATH);
if($writing) {
    echo "Следующая информация: " . $str . " записана в файл: " . "tplt/".$currDate.".txt";
} else {
    echo "Что-то пошло не так!";
}

?>
    </body>
</html>