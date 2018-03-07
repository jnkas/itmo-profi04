<?php
include ROOTDIR . '/vc4-core/view/layouts/head.html';
include ROOTDIR . '/vc4-core/view/layouts/header.html';
?>

<div class='container'>
    <div class="row">
        <div class="col">
            <?php if ($err == TRUE): ?>
                <div class="margin-top-1em"> </div>

                <div class="alert alert-warning" role="alert">
                    <h4 class="alert-heading">Ошибка авторизации!</h4>
                    <p><?php echo $err['auth']; ?></p>
                </div>
            <?php endif; ?>
                <h1>Авторизация</h1>
                <form action="#" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Введите email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Пароль</label>
                        <input type="password" class="form-control" name="password" placeholder="Пароль">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Авторизоваться</button>
                </form>
        </div>
    </div>
</div>

<?php
include ROOTDIR . '/vc4-core/view/layouts/footer.html';
?>