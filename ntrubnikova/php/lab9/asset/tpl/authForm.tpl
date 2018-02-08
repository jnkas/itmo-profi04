<!DOCTYPE html>
<html>
   <head>
     <title>Войти - CMS</title>
      <meta charset="UTF-8">
       <link rel="stylesheet" href="asset/css/styles.css">
   </head>
    <body>
      <div id="error"><?php echo $message; ?></div>
       <h1>Войти - CMS</h1>
       <div id="form">
        <form action="login" method="post">
            <p>Имя пользователя:</p>
            <input type="text" name="login">
            <p>Пароль:</p>
            <input type="password" name="password"><br/>
            <button type="submit" name="submit">Войти</button>
            <button type="reset" name="reset">Отменить</button>
        </form>
        <p>Нет учетной записи? <a href="/register">Зарегистрироваться</a></p>
        </div>
    </body>
</html>