<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/css/styles.css">
</head>
<body>
<form action="/auth" method="post" class="admin-form" enctype="multipart/form-data">
    <label for="login">Login</label>
    <input type="text" name="login" class="form-control " id="login" required>
    <label for="password">Password</label>
    <input type="password" name="password" class="form-control " id="password" required>
    <?php if($errorAuth){
        echo '<span style="color:red;">Неверно введен логин/пароль</span>';
    } ?>
    <button type="submit" class="btn btn-success pull-right">Send</button>
</form>
</body>
</html>