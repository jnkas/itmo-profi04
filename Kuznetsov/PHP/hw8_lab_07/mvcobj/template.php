<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Page name</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <main class="page">

        <?php foreach($data as $value): ?>
        <section class="post">
            <h2>
                <?= $value['title']; ?>
            </h2>
            <p>
                <?= $value['text']; ?>
            </p>
            <small>
                <?= 'id: '.$value['id']; ?>
            </small>


        </section>
        <?php endforeach; ?>

    </main>

    <aside class="sidebar">
        <button><a href="index">Все страницы</a></button>
        <button><a href="admin">Создать страницу</a></button>

        <?php foreach($data as $value): ?>
        <p class="links">
            <button><a href="admin?<?= $value['id']; ?>">edit</a></button>
            <button><a href="del?<?= $value['id']; ?>">delete</a></button>
            <a href="get?<?= $value['id']; ?>">
                <?= $value['title']; ?>
            </a>
        </p>
        <?php endforeach; ?>

    </aside>

</body>

</html>
