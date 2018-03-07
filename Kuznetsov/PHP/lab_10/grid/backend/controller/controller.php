<?php

include '../model/model.php';
include '../../core/databasehandler.php';
include '../../core/config.php';

class Controller {
    
    public function getUsers() {
        $page = $_POST['page'];
        $mdl = new Model();
        $res = $mdl->getUsers($page);
        echo json_encode($res);
    }
    
    public function addUsers() {
        $n = $_POST['name'];
        $l = $_POST['login'];
        $a = $_POST['age'];
        $e = $_POST['email'];
        $page = $_POST['page'];
        $mdl = new Model();
        $mdl->addUsers($n, $l, $a, $e);
        $res = $mdl->getUsers($page);
        echo json_encode($res);
    }
    
    public function deleteUsers() {
        $id = $_POST['id'];
        $page = $_POST['page'];
        $mdl = new Model();
        $mdl->deleteUsers($id);
        $res = $mdl->getUsers($page);
        echo json_encode($res);
    }
    
    public function updateUser() {
        $id = $_POST['id'];
        $n = $_POST['name'];
        $l = $_POST['login'];
        $a = $_POST['age'];
        $e = $_POST['email'];
        $page = $_POST['page'];
        $mdl = new Model();
        $mdl->updateUser($id, $n, $l, $a, $e);
        $res = $mdl->getUsers($page);
        echo json_encode($res);
    } 
}

$route = $_POST['route'];
(!empty($route))? Controller::$route() : null;












