<?php

include './backend/model/model.php';
include './backend/view/view.php';

class Controller {
    public function indexAction() {
        $model = new Model();
        $mdl = $model->getAllPages();
        $v = new View();
        $v->render($mdl, './asset/tpl/template.php');
    }
    
    public function adminAction($id) {
        //админка
        if(!empty($id)) {
            $model = new Model();
            $data = $model->getPage($id);
            $v = new View();
            $v->render($data, './asset/tpl/admin.php');
        } else {
            $v = new View();
            $v->render($d, './asset/tpl/admin.php');
        }
    }
    
    public function addAction() {
        //добавление страницы
        $title = $_POST['page_name'];
        $text = $_POST['page_content'];
        $model = new Model();
        $model->addPage($title, $text);
        header("Location: index");
    }
    
    public function delAction($id) {
        //удаление страницы
        $model = new Model();
        $model->delPage($id);
        header("Location: index");
    }
    
    public function editAction($id) {
        //echo 'редактирование';
        $title = $_POST['page_name'];
        $text = $_POST['page_content'];
        $model = new Model();
        $model->editPage($id, $title, $text);
        header("Location: index");
    }
    
    public function getAction($id) {
        //echo 'получение страницы';
        $model = new Model();
        $mdl = $model->getPage($id);
        $v = new View();
        $v->render($mdl, './asset/tpl/template.php');
    }
}
