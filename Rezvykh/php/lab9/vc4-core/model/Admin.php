<?php

class Admin {

    const SHOW_BY_DEFAULT_ADMIN = 5;

    public static function postsGrid($page, $count= self::SHOW_BY_DEFAULT_ADMIN) {

        $posts = Blog::getPosts($page);

        if (count($posts) > 0) {
            $grid = "<table class='table table-bordered'>
                        <thead>
                            <tr>
                                <th scope='col'>id</th>
                                <th scope='col'>Имя</th>
                                <th scope='col'>Дата</th>
                                <th scope='col'>Черновик</th>
                                <th scope='col'>Url</th>
                                <th scope='col'>Действия</th>
                            </tr>
                        </thead>
                    <tbody>";

            foreach ($posts as $post) {

                if ($post['is_draft'] == 1) {

                }
                $grid .= '<tr>
                            <th scope="row">' . $post['id'] . '</th>
                            <td>' . $post['name'] . '</td>
                            <td>' . $post['date'] . '</td>
                            <td>' . $post['is_draft'] . '</td>
                            <td>' . $post['url'] . '</td>
                            <td></td>
                          </tr>';

            }

            $grid .= "</tbody></table>";
            return $grid;
        }
    }
    public static function newPost($is_draft, $name, $title, $url, $description) {
        $db = new MyPDO();
        $sql = "INSERT INTO posts (is_draft, name, title, url, description) VALUES (:is_draft, :name, :title, :url, :description)";
        $result = $db->prepare($sql);
        $result->bindParam(':is_draft', $is_draft, PDO::PARAM_STR);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':title', $title, PDO::PARAM_STR);
        $result->bindParam(':url', $url, PDO::PARAM_STR);
        $result->bindParam(':description', $description, PDO::PARAM_STR);

        return $result->execute();
    }

    public static function editPost() {
        return TRUE;
    }

}