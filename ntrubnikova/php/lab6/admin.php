<?php

include "config.php";

$categories = "";

foreach ($cats as $value) {
   $categories .= "<option>". $value. "</option>"; 
};

if (!empty($_POST['category']) && !empty($_POST['pagename']) && !empty($_POST['pagetext'])) {
    
    //Запись в файл
    $templateFile = 'pages/default.php';
    $key = array_search($_POST['category'], $cats);
    $file = 'pages/'. $key.'/'. $_POST['pagename']. '.php';
    
    if (!is_dir('pages/'. $key)) {
        mkdir('pages/'. $key);
    };
    
    file_put_contents($file,str_replace('Your content goes here',$_POST['pagetext'],file_get_contents($templateFile)));
    
    file_put_contents($file,str_replace('Doorway Page Title',$_POST['name'],file_get_contents($file)));
}
?>

<!--HTML-->
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>Форма</title>
</head>
<link rel='stylesheet' href='css/styles.css'>
<body>
<div class='center'>
    <div class='form-header'>
        <p>Создать страницу</p>
    </div>
    <div class='form'>
       <form method='post'>
          <p>Категория:</p>
           <select name="category">
                <?php echo $categories ?>
            </select>
           <br/>
           <p>Имя файла:</p>
           <input type="text" name="pagename">
           <br/>
           <p>Имя страницы:</p>
           <input type="text" name="name">
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

