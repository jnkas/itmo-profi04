<?php include_once APP_PATH.'/views/layout/admin_header.php' ?>
    <div class="panel-heading">
        Добавление нового события для календаря
    </div>

    <div class="panel-body" style="width: 90%; margin-left: 5%">
        <form action="/calendar/add_event" method="post" class="admin-form" enctype="multipart/form-data">
            <label for="date">Дата</label>
            <input type="date" name="date" class="form-control " id="date" required>
            <label for="title">Заголовок</label>
            <input type="text" name="title" class="form-control " id="title" required>
            <label for="desc">Описание</label>
            <textarea name="desc" class="form-control " id="desc" required></textarea>
            <label for="image">Файл картинки</label>
            <input name="image" class="form-control " id="image" required type="file">
            <button type="submit" class="btn btn-success pull-right">Send</button>
        </form>
    </div>

<?php include_once APP_PATH.'/views/layout/admin_footer.php' ?>