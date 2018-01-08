<?php
   
 echo '  
    <form action="handler.php" method="POST">
    <p>Дата:
    <input type="date" name="calendar"><br>
    <p>Событие: <br> <input type="text" name="name"></p>
    <p>Описание события: <br /><textarea name="message" cols="30" rows="5"></textarea></p>
    <input type="submit" value="Отправить">
    </form>';

    
?>