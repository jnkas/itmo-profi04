<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>php_Lab8_admin</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<form action="/controller/editNews" method="post">
    <input type="hidden" name="idNews" value="<?php echo $_GET[idNews] ?>">
    <label for="idHeadNews">Заголовок новости</label>
    <input name="nameHeadNews" id="idHeadNews" type="text" value="<?php echo $_GET[nameNews] ?>">
    <label for="idNewsContent">Текст новости:</label>
    <textarea name="nameNewsContent" id="idNewsContent" cols="30" rows="10"><?php echo $_GET[textNews] ?></textarea>
    <button>Submit</button>
</form>
</body>
</html>