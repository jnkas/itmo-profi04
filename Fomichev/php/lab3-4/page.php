<?php
$currFile = file_get_contents("./template/$_GET[selectedDate].txt",FILE_USE_INCLUDE_PATH);
$arr = explode(";", $currFile);
$resultString = "<h1>$_GET[selectedDate]</h1><h3>$arr[1]</h3><img src='./img/$_GET[selectedDate].jpg'><p>$arr[2]</p>";
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lab4</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <script src="js/dateFormat.js"></script>
    <div id="day-calender"><?php echo $resultString;?></div>
</body>
</html>

