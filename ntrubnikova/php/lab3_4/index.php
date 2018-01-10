<?php 

$dt = $_GET['dt'];
$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Календарь</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <script src="js/jquery.min.js"></script>
        <div id="container">
            <div id="day-calendar"></div>'.
            '<div id="check-date" style="visibility:hidden">'.
            $dt.
            '</div></div>'.
    '<script src="js/app.js"></script>      
</body>
</html>';

echo $html;
?>

