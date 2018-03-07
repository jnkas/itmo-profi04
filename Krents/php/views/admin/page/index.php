<?php include_once APP_PATH.'/views/layout/admin_header.php' ?>
    <div class="panel-heading">
        <?= $pageTitle !== null ? $pageTitle : 'Добавление новой страницы(в хранилище)' ?>
    </div>

    <div class="panel-body" style="width: 90%; margin-left: 5%">
        <form action="<?= $actionUrl !== null ? $actionUrl : '/admin/page/add' ?>" method="post" class="admin-form">
            <label for="title">Заголовок страницы</label>
            <input type="text" name="title" class="form-control " id="title" required value="<?= $title ?>">

            <label for="summernote">Содержимое</label>
            <textarea name="content" class="form-control " rows="20" id="summernote" required><?= $content ?></textarea>

            <button type="submit" class="btn btn-success pull-right">Send</button>
        </form>
        <ul>
            <?php foreach ($pages as $key => $page) : ?>
                <li><a href="/admin/page/edit/<?= $key ?>"><?= $page->title ?></a></li>
                <a href="/admin/page/delete/<?= $key ?>">удалить</a>

            <?php endforeach; ?>
        </ul>
    </div>

<?php include_once APP_PATH.'/views/layout/admin_footer.php' ?>