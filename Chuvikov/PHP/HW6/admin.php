<?php

include './config.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin page</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <form action="admin_handler.php" method="post">

        <fieldset id="admin_page">
            <legend>Генератор страниц</legend>

            <label for="category_list">Категория</label>
            <select name="category_list" id="category_list">
            <?php
                
                foreach($categories as $key=>$value) {
                    echo '<option value="' . $key . '">' . $value . '</option>';
                };
                
            ?>
            </select>
            
            <label for="page_name">Название страницы</label>
            <input type="text" name="page_name" id="page_name">
    
            <label for="page_filler">Текст для страницы</label>
            <textarea name="page_filler" id="page_filler" cols="30" rows="10"></textarea>

            <input type="submit" value="Создать">

        </fieldset>
    </form>
</body>

</html>
