<?php

class Controller_Authorization extends Controller
{
    public function checkAuthorization() {
        $model = new Model_Authorization();
        $resultCheck = $model->checkUserProf();
        if ($resultCheck) {
            $dataArr = $model->basicAction();
            $template = "constructMainPage.php";
        } else {
            $dataArr = "";
            $template = "authorization.php";
        }
        echo $this->viewer->render($dataArr, $template);
    }

    public function registrationUser() {
        $model = new Model_Authorization();
        $resultCheck = $model->addUser();
        if ($resultCheck) {
            header("Location:../../index.php");
        } else {
            $dataArr = "";
            $template = "registration.php";
            echo $this->viewer->render($dataArr, $template);
        }

    }

    public function logoutUser() {
        $model = new Model_Authorization();
        $model->logoutUser();
        header("Location:../../index.php");
    }
}