<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>
        <?=basename($_SERVER['SCRIPT_NAME'], '.php')?>
    </title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div id="gen_page">
        <a href="../index.php">На главную</a>
        <p>%s</p>
    </div>
    
    <h3 class="def">Выберите интересующую вас страницу</h3>
    
    <div class="links">
        
        <?php
            include '../menu.php';
        ?>
        
    </div>

</body>

</html>
