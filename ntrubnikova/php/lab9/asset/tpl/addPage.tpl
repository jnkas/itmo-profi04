<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>Создать страницу - CMS</title>
</head>
<link rel='stylesheet' href='../asset/css/styles.css'>
<body>
    <h1>Создать страницу - CMS</h1>
    <form method="post" action="/logout" id="logout"><button>Выйти</button></form>
    <div class='form'>
       <form method='post' action="saveNewPage">
           <p>Заголовок страницы:</p>
           <input type="text" name="pageHeader">
           <br/>
           <p>Текст/HTML страницы:</p>
           <textarea name="pagetext"></textarea>
           <br/>
           <button type='submit' name='submit'>Сохранить</button>
           <button type='submit' name='cancel'>Отменить</button>
       </form>
    </div>
</body>
</html>