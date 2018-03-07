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

            <?php echo $grid; ?>

            <?php echo $pagination->get(); ?>

        </div>
    </div>
</div>

<?php
include ROOTDIR . '/vc4-core/view/layouts/footer.html';
?>

