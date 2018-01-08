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
            
            <label for="newDate">Введите дату события </label>
            <input type="date" name="date" id="date">
            
            <label for="newHeader">Введите заголовок</label>
            <input type="text" name="header" id="header">
            
            <label for="newDesc">Введите описание события</label>
            <textarea name="descr" id="newDesc"></textarea>
            
            <input type="submit" value="Сохранить">
        </fieldset>
    </form>';
    
    ?>

</body>

</html>