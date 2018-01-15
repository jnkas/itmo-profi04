<?php
    $category = $_POST['category'];
    $header = $_POST['header'];
    $desc = $_POST['desc'];

    //записываем в переменную полное имя файла
    $file_name = $header.'.php';
    
    //проверяем существование папки и создаем если таковой нет
    if(!file_exists($category)){
        @mkdir('../'.$category);
    }

    //используя обработчик
    $default ='../skell/default.php'; 
    //записываем в переменную полный адрес файла
    $file_path ='../'.$category.'/'.$file_name; //../sport/
    
    
    //читаем файл в строку
    $get_contents = file_get_contents($default);
    //добавляем описание
    $add_contents = sprintf($get_contents, $desc);
    //записываем файл в строку
    $out_contents = file_put_contents($file_path, $add_contents);

    if($out_contents) echo '
    <!DOCTYPE html>
    <html lang="ru">
        <head>
            <meta charset="UTF-8">
            <title>...</title>
            <link rel="stylesheet" href="../css/style_admin.css">
            <link rel="stylesheet" href="../css/style_menu.css">
       </head>
    <body>
    <p>Файл '.$file_name.' удачно создан!</p><br>
    <a href="index.php">Вернуться к Форме ввода данных >>></a>
    </body>
    </html>';
?>