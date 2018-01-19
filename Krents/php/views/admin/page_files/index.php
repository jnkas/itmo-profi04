<?php include_once APP_PATH.'/views/layout/admin_header.php' ?>
    <div class="panel-heading">
        Добавление нового события для календаря
    </div>

    <div class="panel-body" style="width: 90%; margin-left: 5%">
        <form action="/admin/pages_files/add" method="post" class="admin-form">
            <label for="category">Категория</label>
            <select id="category" name="category" class="form-control " required>
                <?php foreach ($categories as $index => $category) : ?>
                    <option value="<?= $index ?>"><?= $category ?></option>
                <?php endforeach; ?>
            </select>
            <label for="title">Заголовок страницы</label>
            <input type="text" name="title" class="form-control " id="title" required>

            <label for="content">Содержимое</label>
            <textarea name="content" class="form-control " rows="20" id="content" required></textarea>

            <button type="submit" class="btn btn-success pull-right">Send</button>
        </form>
    </div>

<?php include_once APP_PATH.'/views/layout/admin_footer.php' ?>