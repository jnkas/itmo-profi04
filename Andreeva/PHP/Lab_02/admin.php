<?php
echo '
    <html lang="ru">
    <head>
        <meta charset="utf-8">
        <title>admin</title>
        <link rel="stylesheet" href="style_admin.css">
    </head>
    <body>
        <form action="handler.php" method="POST">
            <h1>Форма создания события</h1>
            
            <label for="date">Дата</label>
            <input type="date" id="date" name="date">
            
            <label for="header">Заголовок</label>
            <input type="text" id="header" name="header">
            
            <label for="desc">Описание</label>
            <textarea id="desc" name="desc" rows="7" cols="30"></textarea>
            
            <input type="submit">
        </form>
    </body>
    </html>
    '
?>