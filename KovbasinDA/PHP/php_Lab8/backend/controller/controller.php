<?php

class Controller
{
    public function basicAction()
    {
        $model = new Model();
        $dataArr = $model->basicAction();
        $viewer = new Viewer();
        echo $viewer->render($dataArr, "constructMainPage.php");
    }

    public function addNews()
    {
        $model = new Model();
        $templAdd = "constructMainPage.php";
        if (!empty($_POST)) {
            $dataArr = $model->addNews();
        } else {
            $templAdd = "adminNewNews.php";
            $dataArr = "";
        }
        $viewer = new Viewer();
        echo $viewer->render($dataArr, $templAdd);
    }

    public function deleteNews()
    {
        $model = new Model();
        $dataArr = $model->deleteNews();
        header("Location:../../index.php");
    }

    public function editNews(){
        $model = new Model();
        $templEdit = "constructMainPage.php";
        if (!empty($_POST)) {
            $dataArr = $model->editNews();
        } else {
            $templEdit = "adminEditNews.php";
            $dataArr = "";
        }
        $viewer = new Viewer();
        echo $viewer->render($dataArr, $templEdit);
    }

    public function authorization() {
        $model = new Model();
        $resultCheck = $model->checkUserProf();
        if ($resultCheck) {
            $dataArr = $model->basicAction();
            $template = "constructMainPage.php";
        } else {
            $dataArr = "";
            $template = "authorization.php";
        }
        $viewer = new Viewer();
        echo $viewer->render($dataArr, $template);
    }

    public function logoutUser() {
        $model = new Model();
        $model->logoutUser();
        header("Location:../../index.php");
    }
}