<?php

class Controller
{
    public function basicAction()
    {
        $model = new Model();
        $dataArr = $model->basicAction();
        $viewer = new Viewer();
        echo $viewer->render($dataArr);
    }

    public function addNews()
    {
        $model = new Model();
        $dataArr = $model->addNews();
        header("Location:../index.php");
    }

    public function deleteNews()
    {
        $model = new Model();
        $dataArr = $model->deleteNews();
        header("Location:../../index.php");
    }

    public function editNews(){
        $model = new Model();
        $dataArr = $model->editNews();
        header("Location:../index.php");
    }
}