<?php

class AdminController
{
    public function actionIndex() {

        $countActivePosts = Blog::getTotalCountActivePosts();
        $countAllPosts = Blog::getTotalCountAllPosts();


        require_once(ROOTDIR . '/vc4-core/view/admin/index.php');
        return true;
    }

    public function actionAllPosts($page) {

        if (count($page) == 0) {
            $page = 1;
        } else {
            $page = $page[0];
        }

        $posts = new Blog();
        $totalPosts = $posts->getTotalCountAllPosts();

        $pagination = new Pagination($totalPosts, $page, Admin::SHOW_BY_DEFAULT_ADMIN, 'page-');



        $posts = Blog::getPosts($page);

        $grid = Admin::postsGrid($page);

        require_once(ROOTDIR . '/vc4-core/view/admin/allposts.php');
        return true;
    }

    public function actionAddPost() {

        if(isset($_POST['is_draft'])) {
            $is_draft = 1;
        } else {
            $is_draft = 0;
        }

        $name = '';
        $title = '';
        $url = '';
        $description = '';
        $result = FALSE;

        if(isset($_POST['submit'])) {
            $name = $_POST['name'];
            $title = $_POST['title'];
            $url = $_POST['url'];
            $description = $_POST['description'];

            print_r($is_draft);

            $err = FALSE;

            //Если нет ошибок при заполнении формы
            if ($err == FALSE) {
                $result = Admin::newPost($is_draft, $name, $title, $url, $description);
            }
        }

        require_once(ROOTDIR . '/vc4-core/view/admin/addpost.php');
        return true;
    }


}