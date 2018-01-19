<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin page</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <form action="<?= (empty($data))? add : edit."?{$data[0]['id']}"; ?>" method="post">

        <fieldset id="admin_page">
            <legend>Генератор страниц</legend>

            <label for="page_name">Название страницы</label>
            <input type="text" name="page_name" id="page_name" value="<?= $data[0]['title'] ?>">

            <label for="page_content">Текст для страницы</label>
            <textarea name="page_content" id="page_content" cols="30" rows="10"><?= str_replace("\r\n", "", $data[0]['text'])?></textarea>

            <input type="submit" value="Создать">

        </fieldset>
    </form>

</body>

</html>
