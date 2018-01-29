<?php
//моя реализация
session_start();
$app = new App();


if (isset($_POST["logout"])) :
    $app->request->auth->logout();
    header("Location: index");

elseif($app->request->auth->isAuth()) :
    $way = trim(basename($_SERVER['REQUEST_URI']), '/');
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Admin page</title>
        <link rel="stylesheet" href="./asset/css/style.css">
    </head>
    <body>
        <form action="<?= $way; ?>" method="post">
            <input type="submit" name="logout" value="logout">
            <button><a href="index" class="auth_page">На главную</a></button>
        </form>
        
        <form action="<?= (empty($data))? add : edit."?".$data[0]['id']; ?>" method="post">

            <fieldset class="admin_page">
                <legend>Генератор страниц</legend>

                <label for="page_name">Название страницы</label>
                <input type="text" name="page_name" id="page_name" value="<?= $data[0]['title']; ?>" required>

                <label for="page_content">Текст для страницы</label>
                <textarea name="page_content" id="page_content" cols="30" rows="10" required><?= str_replace('<br>', "\r\n", $data[0]['text']); ?></textarea>

                <input type="submit" value="Создать">

            </fieldset>
        </form>
    </body>
    </html>

<?php elseif(isset($_POST['login']) && isset($_POST['password']) && isset($_POST['login_submit'])) :
    
    $login = $app->request->input->get('login');
    $psw = $app->request->input->get('password');
    $app->request->auth->init($login, $psw);
    $app->request->auth->verification();
    $way = trim(basename($_SERVER['REQUEST_URI']), '/');
    header("Location: {$way}");
    
else : 
    $way = trim(basename($_SERVER['REQUEST_URI']), '/');
?>

    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Admin</title>
        <link rel="stylesheet" href="./asset/css/style.css">
    </head>
    <body>
        <button><a href="index" class="auth_page">На главную</a></button>
        <form action="<?= $way; ?>" method="POST" class="auth_page">
            <fieldset>
                <legend>Авторизуйтесь</legend>

                <label for="login">Введите логин</label>
                <input type="text" name="login" id="login">
                
                <label for="password">Введите пароль</label>
                <input type="password" name="password" id="password">
                
                <input type="submit" name="login_submit" value="Войти">
            </fieldset>
        </form>
    </body>
    </html>
<?php endif; ?>









