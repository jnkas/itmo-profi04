<?php
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>php_Lab1</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/dateFormat.js"></script>
    <script src="js/mustache.js"></script>

    <div id="headerFilter">
        <label for="">Вывести события с: </label><input type="date" id="inpFirstDateFilter" name="firstDateFilter">
        <label for=""></label> по: <input type="date" id="inpSecondDateFilter" name="secondDateFilter">
        <button type="button" id="searchButton">Поиск</button>
    </div>
    <script src="js/filter.js"></script>
    <div id="eventRibbon"></div>


</body>
</html>
