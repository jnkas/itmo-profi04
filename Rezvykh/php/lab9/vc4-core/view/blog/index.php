<?php
include ROOTDIR . '/vc4-core/view/layouts/head.html';
include ROOTDIR . '/vc4-core/view/layouts/header.html';
?>

<div class='container'>
    <div class="row">
        <div class="col">
            <h1>Главная страница</h1>

            <ul class="list-unstyled">
            <?php foreach ($psts as $postItem):?>
                <li class="media mb-3">
                    <!--<img class="mr-3" src="..." alt="Generic placeholder image"> -->
                    <div class="media-body">
                        <h5 class="mt-0 mb-1"><a href="post/<?php echo $postItem['id']; ?>"><?php echo $postItem['title']; ?></a></h5>
                        <?php echo $postItem['description'] ?>
                    </div>
                </li>
            <?php endforeach; ?>
            </ul>
            <?php echo $pagination->get(); ?>
        </div>
    </div>
</div>

<?php
include ROOTDIR . '/vc4-core/view/layouts/footer.html';
?>

