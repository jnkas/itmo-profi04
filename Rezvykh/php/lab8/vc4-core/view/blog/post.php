<?php
include ROOTDIR . '/vc4-core/view/layouts/head.html';
include ROOTDIR . '/vc4-core/view/layouts/header.html';
?>

    <div class='container'>
        <div class="row">
            <div class="col">
                <h1>Пост <?php echo $post['id']; ?></h1>

                Выводим каждый пост по отдельности<br>


                <?php echo $post['title']; ?>
            </div>
        </div>
    </div>

<?php include ROOTDIR . '/vc4-core/view/layouts/footer.html'; ?>