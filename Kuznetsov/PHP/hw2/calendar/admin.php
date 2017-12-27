<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <?php
    echo '<form action="handler.php" method="POST">

        <fieldset>
            <legend>Заполните поля для внесения информации в базу</legend>
            
            <label for="my_date">Выберите дату</label>
            <input type="date" name="date" id="my_date">
            
            <label for="my_header">Введите заголовок события</label>
            <input type="text" name="header" id="my_header">
            
            <label for="my_desc">Введите описание события</label>
            <textarea name="desc" id="my_desc"></textarea>
            
            <input type="submit" value="Отправить">

        </fieldset>

    </form>';
    
    ?>

</body>

</html>
