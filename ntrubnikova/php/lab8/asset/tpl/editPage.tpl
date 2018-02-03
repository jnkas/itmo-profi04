<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>CMS - Редактировать страницу</title>
</head>
<link rel='stylesheet' href='../asset/css/styles.css'>
<body>
<div class='center'>
    <div class='form-header'>
        <h1>CMS - Редактировать страницу</h1>
    </div>
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
           <button type='submit'>Сохранить</button>
           <button type='reset'>Сбросить</button>
       </form>
    </div>
</div>
</body>
</html>