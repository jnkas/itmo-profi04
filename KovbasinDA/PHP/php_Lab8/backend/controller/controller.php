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
        $viewer = new Viewer();
        echo $viewer->render($dataArr);
    }
}