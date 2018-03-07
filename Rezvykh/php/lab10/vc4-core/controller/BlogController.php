<?php


class BlogController
{
    public function actionIndex($page) {


        if (count($page) == 0) {
            $page = 1;
        } else {
            $page = $page[0];
        }

        $psts = array();
        $posts = new Blog();

        $totalPosts = $posts->getTotalCountAllPosts();
        $pagination = new Pagination($totalPosts, $page, Blog::SHOW_BY_DEFAULT, 'page-');

        $psts = $posts->getLatestPosts($page);

        require_once(ROOTDIR . '/vc4-core/view/blog/index.php');
        return true;
    }

    public function actionView($id) {

        $pst = array();
        $post = new Blog();

        $pst = $post->getPostById($id);

        require_once(ROOTDIR . '/vc4-core/view/blog/post.php');
        return true;

    }

}