<?php
include ROOTDIR . '/vc4-core/view/layouts/head.html';
include ROOTDIR . '/vc4-core/view/layouts/header.html';
?>

<div class='container'>
    <div class="row">
        <div class="col">
            <h1>Администраторская</h1>
            <nav class="nav nav-pills mb-4">
                <a class="nav-link" href="<?php echo ROOTSITE . 'admin/'?>">#</a>
                <a class="nav-link active" href="<?php echo ROOTSITE . 'admin/allposts'?>">Посты</a>
                <a class="nav-link" href="<?php echo ROOTSITE . 'admin/allusers'?>">Пользователи</a>
                <a class="ml-auto" href="<?php echo ROOTSITE . 'admin/addpost'?>"><i class="fa fa-plus-circle fa-2x text-success" data-toggle="tooltip" data-placement="left" title="Добавить пост"></i></a>
            </nav>
            <h4>Новый пост</h4>
            <form action="#" method="post">
                <div class="form-group">
                    <label>Название</label>
                    <input type="text" class="form-control" name="name" placeholder="Название статьи" value="<?php echo $name; ?>">
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


        </div>
    </div>
</div>

<?php
include ROOTDIR . '/vc4-core/view/layouts/footer.html';
?>

