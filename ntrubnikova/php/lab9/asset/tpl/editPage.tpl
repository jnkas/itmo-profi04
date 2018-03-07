<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>Редактировать страницу - CMS</title>
</head>
<link rel='stylesheet' href='../asset/css/styles.css'>
<body>
    <h1>Редактировать страницу - CMS</h1>
    <form method="post" action="/logout" id="logout"><button>Выйти</button></form>
    <div class='form'>
       <form method='post' action="saveModifiedPage">
           <p>ID страницы:
               <input type="text" name="id" value="<?php print $id;?>" readonly class="readonly"></p>
           <p>Заголовок страницы:</p>
           <input type="text" name="pageHeader" value = "<?php print $pageHeader;?>">
           <br/>
           <p>Текст/HTML страницы:</p>
           <textarea name="pagetext"><?php print $pageContent;?></textarea>
           <br/>
           <button type='submit' name='submit'>Сохранить</button>
           <button type='submit' name='cancel'>Отменить</button>
       </form>
    </div>
</body>
</html>