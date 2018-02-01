<?php

$app = new App();

if($app->request->auth->isAuth()) : //если вошли?>

    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Main page</title>
        <link rel="stylesheet" href="./asset/css/style.css">
    </head>
    <body>
    
       <div class="page">
           
           <main class="page">

            <?php if(!empty($data)) :
            foreach($data as $value): ?>
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

    <?php endforeach;
    endif; ?>

        </main>

        <aside class="sidebar">

            <div class="login_info">
                <span><?= "Вы вошли как: {$_SESSION['username']}"; ?></span>
                <button><a href="logout">Выйти</a></button>
            </div>

            <button><a href="admin">Создать статью</a></button>
            <?= (count($data) === 1)? '<button><a href="index">Все статьи</a></button>' : null ; ?>
            
            <p class="list_title">Список статей:</p>
            <?php if(!empty($data)) :
            foreach($data as $value): ?>
            <p class="links">
                
                <a href="get?<?= $value['id']; ?>" class="links">
                    <?= $value['id'] . ': ' . $value['title']; ?>
                </a>
                
                <button class="btn"><a href="admin?<?= $value['id']; ?>">edit</a></button>
                <button class="btn"><a href="del?<?= $value['id']; ?>">delete</a></button>
                
            </p>

    <?php endforeach;
    endif; ?>

        </aside>
           
       </div>
        
    </body>
    </html>

<?php else : //если не вошли?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <title>Main page</title>
        <link rel="stylesheet" href="./asset/css/style.css">
    </head>

    <body>
        
        <div class="page">
            
            <main class="page">

            <?php if(!empty($data)) :
            foreach($data as $value): ?>
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

    <?php endforeach;
    endif; ?>

        </main>

        <aside class="sidebar">
            
            <div class="login_info">
                <span>Вы не авторизованы</span>
                <button><a href="auth">Войти</a></button>
            </div>
            

            <?= (count($data) === 1)? '<button><a href="index">Все статьи</a></button>' : null ; ?>
<!--            <button><a href="admin">Создать страницу</a></button>-->
            <p class="list_title">Список статей:</p>
            <?php if(!empty($data)) :
            foreach($data as $value): ?>
            <p class="links">
<!--
                <button><a href="admin?<?= $value['id']; ?>">edit</a></button>
                <button><a href="del?<?= $value['id']; ?>">delete</a></button>
-->
                <a href="get?<?= $value['id']; ?>">
                    <?= $value['id'] . ': ' . $value['title']; ?>
                </a>
            </p>

    <?php endforeach;
    endif; ?>

        </aside>
            
        </div>
        
        
    </body>
    </html>

<?php endif; ?>
