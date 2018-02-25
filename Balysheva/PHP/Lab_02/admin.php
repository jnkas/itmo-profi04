<html>
<head>
    <meta charset="UTF-8">
    <title>php_Lab1</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div id="day-calender">
    <form action="handler_form.php" method="post">
        <div><label for="inpDateEvent">Дата события:</label><input id="inpDateEvent" type="date" name="dateEvent"></div>
        <div><label for="inpHeadEvent">Заголовок события:</label><input id="inpHeadEvent" type="text" name="headEvent" ></div>

        <div><label for="inpDescriptionEvent">Описание события:</label>
        <textarea name="descriptionEvent" id="inpDescriptionEvent" cols="50" rows="10"></textarea></div>
        <div><button type="submit" style="width: 300px">Send</button></div>
    </form>
</div>

</body>
</html>