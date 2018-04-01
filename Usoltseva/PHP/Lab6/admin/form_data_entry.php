<?php
include "../config.php";
?>

<html lang="ru">

    <head>
        <meta charset="utf-8">
        <title>admin</title>

        <link rel="stylesheet" href="../css/style_admin.css">
    </head>

    <body>
	
		<div class="goSite"><a href="../index.php">На главную</a></div>
        <form action="handler.php" method="POST">
            <fieldset>
                <legend>Создать страницу</legend>

                <select name="category" id="logCategories">

					<option style="font-weight: bold;">Выберите категорию:</option>
					<?php
						foreach($arrCategories as $key=>$value) {
							echo "<option value='$key'>$value</option>";
						};
					?>
                </select>
				
                <label for="nameCreatePage">Название страницы (латиницей):</label>
                <input type="text" name="nameCreatePage" id="nameCreatePage">

                <label for="desc">Описание:</label>
                <textarea name="desc" id="desc" rows="10" cols="30"></textarea>

                <input type="submit">
            </fieldset>
        </form>

    </body>

</html>