<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/css/styles.css">
</head>
<body>
<form action="/calendar/add_event" method="post" class="admin-form" enctype="multipart/form-data">
    <label for="date">Дата</label>
    <input type="date" name="date" class="form-control " id="date" required>
    <label for="title">Заголовок</label>
    <input type="text" name="title" class="form-control " id="title" required>
    <label for="desc">Описание</label>
    <textarea name="desc" class="form-control " id="desc" required></textarea>
    <label for="image">Файл картинки</label>
    <input name="image" class="form-control " id="image" required type="file">
    <button type="submit" class="btn btn-success pull-right">Send</button>
</form>
</body>
</html>