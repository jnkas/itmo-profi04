<?php

return array(
    'admin/allposts' => 'admin/allposts',
    'admin/allposts/page-([0-9]+)' => 'admin/allposts/$1',
    'admin/addpost' => 'admin/addpost',
    'admin' => 'admin/index',
    'post/([0-9]+)' => 'blog/view/$1',
    'index.php' => 'blog/index',
    'page-([0-9]+)' => 'blog/index/$1',
    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',

    '' => 'blog/index',
);