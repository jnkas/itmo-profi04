<?php
    include "../config.php";
?>


<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>admin</title>
        <link rel="stylesheet" href="../css/style_admin.css">
    </head>
    <body>
        <form action="handler.php" method="POST">
                <h1>Форма ввода данных</h1>
                
                <label for="category">Категория</label>
                <select name="category" id="category">
<!--Здесь из файла config.php выводится список 
заранее прописанных категорий
<option>Спорт</option> и тд-->
                <?php
                    
                    foreach($mass as $key=>$value){
                        echo '<option value="'.$key.'">'.$value.'</option>';
                    }
                    ?>
                
                </select>
                
                <label for="header">Название файла</label>
                <input type="text" id="header" name="header">
               
               <label for="desc">Описание</label>
               <textarea name="desc" id="desc" rows="10" cols="30"></textarea>
               
               <input type="submit">
        </form>
    
    </body>
</html>