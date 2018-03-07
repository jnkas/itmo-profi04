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
                <a class="nav-link" href="<?php echo ROOTSITE . 'admin/allposts'?>">Посты</a>
                <a class="nav-link" href="<?php echo ROOTSITE . 'admin/allusers'?>">Пользователи</a>
                <i class="fa fa-plus-circle fa-2x text-secondary ml-auto" data-toggle="tooltip" data-placement="left" title="Добавить пост"></i>
            </nav>
            <h2>Новый пост</h2>
            <form class="mt-4" action="#" method="post">
                <div class="form-group row">
                    <label class="col-sm-2">Черновик</label>
                    <input class="form-control col-sm-10" type="checkbox" value="" name="is_draft">
                </div>
                <div class="form-group row">
                    <label class="col-sm-2">Название</label>
                    <input type="text" class="form-control col-sm-10" name="name" placeholder="Название статьи">
                </div>
                <div class="form-group row">
                    <label class="col-sm-2">Заголовок</label>
                    <input type="text" class="form-control col-sm-10" name="title" placeholder="Название статьи">
                </div>
                <div class="form-group row">
                    <label class="col-sm-2">Url</label>
                    <input type="text" class="form-control col-sm-10" name="url" placeholder="Url статьи">
                </div>
                <div class="form-group row">
                    <label class="col-sm-2">Текст статьи</label>
                    <textarea class="form-control col-sm-10" name="description" placeholder="Текст статьи"></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Создать статью</button>
            </form>
        </div>
    </div>
</div>

<?php
include ROOTDIR . '/vc4-core/view/layouts/footer.html';
?>

