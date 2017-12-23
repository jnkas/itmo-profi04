<?php 
header('Content-Type: text/html; charset=utf-8');

$form = "";

?>

<html>
   <header>
      <meta charset="UTF-8">
       <style>
           body {
               font-family: Arial;
           }
           input, textarea {
               margin: 5px 0 10px 0;
               width: 300px;
               height: 30px;
               background-color: gainsboro;
           }
           
           textarea {
               height: 200px;
               background-color: gainsboro;
           }
           
           h2 {
               padding: 10px 0;
               margin-bottom: 0;
           }
           button {
               background-color: lightgray;
               color: darkslategray;
               border-radius: 3px;
               height: 30px;
               width: 100px;
               margin-right: 40px;
               margin-left: 10px;
               font-size: 15px;
           }
       </style>
   </header>
    <body>
       <h2>Событие для календаря</h2>
        <form action="handler.php" method="post">
           
            Дата:<br>
            <input type="date" name="date"><br>
            Заголовок:<br>
            <input type="text" name="title"><br>
            Текст:<br>
            <textarea name="description"></textarea><br>
            <button type="submit">Записать</button>
            <button type="reset">Сбросить</button>
        </form>
    </body>
</html>
