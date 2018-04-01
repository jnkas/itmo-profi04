<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <title>CMS - Создать страницу</title>
</head>
<link rel='stylesheet' href='../asset/css/styles.css'>
<body>
<div class='center'>
    <div class='form-header'>
        <h1>CMS - Создать страницу</h1>
    </div>
    <div class='form'>
       <form method='post' action="saveNewPage">
           <p>Заголовок страницы:</p>
           <input type="text" name="pageHeader">
           <br/>
           <p>Текст страницы:</p>
           <textarea name="pagetext"></textarea>
           <br/>
           <button type='submit'>Сохранить</button>
           <button type='reset'>Сбросить</button>
       </form>
    </div>
</div>
</body>
</html>