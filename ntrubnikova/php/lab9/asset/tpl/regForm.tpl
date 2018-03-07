<!DOCTYPE html>
<html>
   <head>
     <title>Зарегистрироваться - CMS</title>
      <meta charset="UTF-8">
       <link rel="stylesheet" href="asset/css/styles.css">
       <script type="text/javascript" src=asset/js/jquery.min.js></script>
   </head>
    <body>
       <h1>Зарегистрироваться - CMS</h1>
       <div id="form">
       <?php echo $error;?>
        <form action="saveUser" method="post">
            <p>Имя пользователя:</p>
            <input type="text" name="login" id="login">
            <p>Пароль:</p>
            <input type="password" name="password" id="password"><br/>
            <p>Повторить пароль:</p>
            <input type="password" name="password_confirm" id="confirm">
            <span id="error"></span>
            <br/>
            <button type="submit" name="submit" id="register">Зарегистрироваться</button>
            <button type="reset" name="cancel">Отменить</button>
        </form>
        </div>
        <script type="text/javascript" src=asset/js/register.js></script>
    </body>
</html>