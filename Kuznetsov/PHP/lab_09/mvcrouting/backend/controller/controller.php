<?php

class Controller {
    public function indexAction() {
        //главная
        $model = new Model();
        $mdl = $model->getAllPages();
        $v = new View('template.php');
        $v->render($mdl);
    }
    
    public function adminAction($id) {
        //админка
        if(!empty($id)) {
            $model = new Model();
            $data = $model->getPage($id);
            $v = new View('admin.php');
            $v->render($data);
        } else {
            $v = new View('admin.php');
            $v->render($d);
        }
    }
    
    public function addAction() {
        //добавление страницы
        //$title = $_POST['page_name'];
        //$text = $_POST['page_content'];
        $app = new App();
        $title = $app->request->input->get('page_name');
        $text = $app->request->input->get('page_content');
        $model = new Model();
        $model->addPage($title, $text);
        header("Location: index");
    }
    
    public function delAction($id) {
        //удаление страницы
        if($_SESSION['auth'] === true) {
            $model = new Model();
            $model->delPage($id);
        }
        header("Location: index");
    }
    
    public function editAction($id) {
        //echo 'редактирование';
        //$title = $_POST['page_name'];
        //$text = $_POST['page_content'];
        $app = new App();
        $title = $app->request->input->get('page_name');
        $text = $app->request->input->get('page_content');
        $model = new Model();
        $model->editPage($id, $title, $text);
        header("Location: index");
    }
    
    public function getAction($id) {
        //echo 'получение страницы';
        $model = new Model();
        $mdl = $model->getPage($id);
        $v = new View('template.php');
        $v->render($mdl);
    }
}
