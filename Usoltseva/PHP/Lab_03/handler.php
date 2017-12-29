<html>

<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<?php
$newDate = (string)$_POST["date"];
$tempDate = new DateTime($newDate);
$formattedDate = date_format($tempDate,"d.m.Y");
$newHeader = $_POST["header"];
$newDescr = $_POST["descr"];
/* $newImg = $current . ".jpg"; */
    
$toSave = $formattedDate . ";" . $newHeader . ";" . $newDescr /* .";" . $newImg */;
$file = "tmpl/" . $formattedDate . ".txt";
file_put_contents($file, $toSave);
?>
    </body>
</html>


