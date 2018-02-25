<?php

class Controller_Admin extends Controller
{
    public function mainPage() {
        echo $this->viewer->render("","admin.php");
    }

    public function loadData() {
        $model = new Model_Admin();
        $result = $model->loadData();
        header("Content-Type: application/json");
        echo json_encode($result);
    }

    public function insertItem() {
        $model = new Model_Admin();
        $result = $model->insertItem();
        header("Content-Type: application/json");
        echo json_encode($result);
    }

    public function updateItem() {
        $model = new Model_Admin();
        $result = $model->updateItem();
        header("Content-Type: application/json");
        echo json_encode($result);
    }

    public function deleteItem() {
        $model = new Model_Admin();
        $result = $model->deleteItem();
        header("Content-Type: application/json");
        echo json_encode($result);
    }
}