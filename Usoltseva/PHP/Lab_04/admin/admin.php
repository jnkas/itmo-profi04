<?php

session_start();

?>
 <html>
   <header>
     <title>Событие календаря</title>
      <meta charset="UTF-8">
       <link rel="stylesheet" href="../css/admin.css">
   </header>
    <body>
       <h2>Событие календаря</h2>
        <form action="handler.php" method="POST">
                <label for="newDate">Введите дату события</label>
                <input type="date" name="date" id="date"><br>

                <label for="newHeader">Введите заголовок</label>
                <input type="text" name="header" id="header"><br>

                <label for="newDesc">Введите описание события</label>
                <textarea name="descr" id="newDesc"></textarea><br><br>

                <input type="submit" value="Сохранить">
        </form>
    </body>
</html>