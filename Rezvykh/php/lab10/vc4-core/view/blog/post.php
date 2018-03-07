<?php
include ROOTDIR . '/vc4-core/view/layouts/head.html';
include ROOTDIR . '/vc4-core/view/layouts/header.html';
?>

    <div class='container'>
        <div class="row">
            <div class="col">
                <h1><?php echo $pst['title']; ?></h1>
                <p class="text-secondary"><?php echo $pst['date']; ?></p>
                <p><?php echo $pst['description']; ?></p>
            </div>
        </div>
    </div>

<?php include ROOTDIR . '/vc4-core/view/layouts/footer.html'; ?>