<?php


class Post {

    const SHOW_BY_DEFAULT = 10;

    public function getLatestPosts($count = self::SHOW_BY_DEFAULT) {


    }

    public static function getPostById($id = 1) {

        $post['id'] = 1;
        $post['name'] = 'Имя первой статьи';
        $post['title'] = 'Тайтл первой статьи';
        $post['description'] = 'Текст первой статьи';
        $post['is_draft'] = 0;

        return $post;

    }


}