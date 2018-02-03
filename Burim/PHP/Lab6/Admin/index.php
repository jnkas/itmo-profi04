<?php
    include "../configuration.php";
    foreach ($arrCategory as $key => $value)
    {
        if(file_exists('../'.$key) !== true)
        {
            mkdir("../".$key);
        };
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lab6</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="mainForm">
        <form action="adminHandler.php" method="post">
            <div>
                <label for="folderCategory">Директория:</label>
                <select name="folderCategory" id="folderCategory">
                    <?php
                    foreach ($arrCategory as $value)
                    {
                        echo "<option>".$value."</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="secondTypeDiv"><label for="namePage">Название страницы:</label>
                <input type="text" name="namePage" id="namePage">
            </div>
            <div class="secondTypeDiv"><label for="textAreaPage">Текст страницы:</label>
                <textarea name="textAreaPage" id="textAreaPage" cols="30" rows="10"></textarea>
            </div>
            <button>Submit</button>
        </form>
    </div>
</body>
</html>