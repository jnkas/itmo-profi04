<?php
include ROOTDIR . '/vc4-core/view/layouts/head.html';
include ROOTDIR . '/vc4-core/view/layouts/header.html';
?>

<div class='container'>
    <div class="row">
        <div class="col">
            <?php if ($result == TRUE): ?>
                <div class="margin-top-1em"> </div>

                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Вы зарегистрированы!</h4>
                    <p>Поздравляем, ваша регистрация прошла успешно.</p>
                    <hr>
                </div>
            <?php else: ?>
                <h1>Регистрация</h1>
                <form action="#" method="post">
                    <div class="form-group">
                        <label>Имя</label>
                        <input type="text" class="form-control <?php if (isset($errName) && $errName == TRUE) { echo 'is-invalid'; } ?>" name="name" placeholder="Введите имя" value="<?php echo $name; ?>">
                        <div class="invalid-feedback"><?php echo $err['name']; ?></div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control <?php if (isset($errEmail) && $errEmail == TRUE) { echo 'is-invalid'; } ?>" name="email" aria-describedby="emailHelp" placeholder="Введите email" value="<?php echo $email; ?>">
                        <small class="form-text text-muted">Введите ваш email, который будет использоваться для авторизации</small>
                        <div class="invalid-feedback"><?php echo $err['email']; ?></div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Пароль</label>
                        <input type="password" class="form-control <?php if (isset($errPassword) && $errPassword == TRUE) { echo 'is-invalid'; } ?>" name="password" placeholder="Пароль"  value="<?php echo $password; ?>">
                        <div class="invalid-feedback"><?php echo $err['password']; ?></div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Регистрация</button>
                </form>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php
include ROOTDIR . '/vc4-core/view/layouts/footer.html';
?>
