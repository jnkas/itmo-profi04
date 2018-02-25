<?php

class Controller_Main extends Controller
{
    public function index()
    {
        $model = new Model_Main();
        $dataArr = $model->basicAction();
        echo $this->viewer->render($dataArr, "constructMainPage.php");
    }

    public function addNews()
    {
        $model = new Model_Main();
        $templAdd = "constructMainPage.php";
        if (!empty($_POST)) {
            $dataArr = $model->addNews();
            header("Location:../../index.php");
        } else {
            $templAdd = "adminNewNews.php";
            $dataArr = "";
        }
        echo $this->viewer->render($dataArr, $templAdd);
    }

    public function editNews(){
        $model = new Model_Main();
        $templEdit = "constructMainPage.php";
        if (!empty($_POST)) {
            $dataArr = $model->editNews();
        } else {
            $templEdit = "adminEditNews.php";
            $dataArr = "";
        }
        echo $this->viewer->render($dataArr, $templEdit);
    }

    public function deleteNews()
    {
        $model = new Model_Main();
        $model->deleteNews();
        header("Location:../../index.php");
    }
}