<?php

class Blog {

    const SHOW_BY_DEFAULT = 6;

    public function getLatestPosts($page, $count = self::SHOW_BY_DEFAULT) {

        $page = intval($page);
        $offset = ($page - 1) * $count;

        $db = new MyPDO();
        $postList = array();
        $result = $db->query('SELECT id, name, title, description, is_draft, sort, url, date '
                                        . 'FROM posts '
                                        . 'WHERE is_draft!=1 '
                                        . 'ORDER BY date DESC '
                                        . 'LIMIT ' . $count
                                        . ' OFFSET ' . $offset);
        $i = 0;
        while ($row = $result->fetch()) {
            $postList[$i]['id'] = $row['id'];
            $postList[$i]['name'] = $row['name'];
            $postList[$i]['title'] = $row['title'];
            $postList[$i]['description'] = $row['description'];
            $postList[$i]['url'] = $row['url'];
            $postList[$i]['date'] = $row['date'];
            $i++;
        }
        return $postList;
    }

    public function getPostById($postId) {

        $id = $postId[0];
        $db = new MyPDO();

        $result = $db->query('SELECT * from posts WHERE id=' . $id);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $post = $result->fetch();

        return $post;
    }

    public static function getTotalCountActivePosts() {
        $db = new MyPDO();
        $result = $db->query('SELECT COUNT(*) from posts WHERE is_draft!=1');
        $result->setFetchMode(PDO::FETCH_NUM);
        $count = $result->fetch();
        return $count[0];
    }

    public static function getTotalCountAllPosts() {
        $db = new MyPDO();
        $result = $db->query('SELECT COUNT(*) from posts');
        $result->setFetchMode(PDO::FETCH_NUM);
        $count = $result->fetch();
        return $count[0];
    }

    public static function getPosts($page, $count = Admin::SHOW_BY_DEFAULT_ADMIN) {

        $page = intval($page);
        $offset = ($page - 1) * $count;

        $db = new MyPDO();
        $postList = array();
        $result = $db->query('SELECT id, name, title, description, is_draft, sort, url, date '
            . 'FROM posts '
            //. 'WHERE is_draft!=1 '
            . 'ORDER BY date ASC '
            . 'LIMIT ' . $count
            . ' OFFSET ' . $offset);
        $i = 0;
        while ($row = $result->fetch()) {
            $postList[$i]['id'] = $row['id'];
            $postList[$i]['name'] = $row['name'];
            $postList[$i]['is_draft'] = $row['is_draft'];
            $postList[$i]['title'] = $row['title'];
            $postList[$i]['description'] = $row['description'];
            $postList[$i]['url'] = $row['url'];
            $postList[$i]['date'] = $row['date'];
            $i++;
        }
        return $postList;

    }

}