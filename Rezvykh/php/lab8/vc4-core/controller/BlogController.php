<?php

include_once ROOTDIR . '/vc4-core/model/Post.php';


class BlogController
{
    public function actionIndex() {
        require_once(ROOTDIR . '/vc4-core/view/blog/index.php');
        return true;
    }

    public function actionView($postId) {

        $post = array();
        $post = Post::getPostById($postId);

        require_once(ROOTDIR . '/vc4-core/view/blog/post.php');
        return true;

    }

}