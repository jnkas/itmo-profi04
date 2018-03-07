<?php
include ROOTDIR . '/vc4-core/view/layouts/head.html';
include ROOTDIR . '/vc4-core/view/layouts/header.html';
?>

<div class='container'>
    <div class="row">
        <div class="col">
            <h1>Администраторская</h1>
            <nav class="nav nav-pills mb-4">
                <a class="nav-link active" href="<?php echo ROOTSITE . 'admin/'?>">#</a>
                <a class="nav-link" href="<?php echo ROOTSITE . 'admin/allposts'?>">Посты</a>
                <a class="nav-link" href="<?php echo ROOTSITE . 'admin/allusers'?>">Пользователи</a>
            </nav>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">Посты:</div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Активных постов: <?php echo $countActivePosts; ?></li>
                                <li class="list-group-item">Черновиков: <?php echo $countAllPosts-$countActivePosts; ?></li>
                                <li class="list-group-item">Всего постов: <?php echo $countAllPosts; ?></li>
                            </ul>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-header">Пользователи:</div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Обычных пользователей: </li>
                            <li class="list-group-item">Администраторов: </li>
                            <li class="list-group-item">Всего пользователей: </li>
                        </ul>
                    </div>
                </div>


        </div>
    </div>
</div>

<?php
include ROOTDIR . '/vc4-core/view/layouts/footer.html';
?>

