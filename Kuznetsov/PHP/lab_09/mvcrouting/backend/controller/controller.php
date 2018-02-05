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
            $v->render($nothing);
        }
    }
    
    public function addAction() {
        //добавление страницы
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
    
    public function authAction() {
        //страница авторизации
        $v = new View('login.php');
        $v->render($nothing);
    }
    
    public function checkAction() {
        //проверка авторизации
        if(isset($_POST['login']) && isset($_POST['password']) && isset($_POST['login_submit'])) {
            $app = new App();
            $login = $app->request->input->get('login');
            $psw = $app->request->input->get('password');
            $app->request->auth->init($login, $psw);
            
            if($app->request->auth->verification()) {
                header("Location: index");
            } else {
                header("Location: auth");
            }
        }
    }
    
    public function logoutAction() {
        //выход из учетной записи
        $app = new App();
        $app->request->auth->logout();
        header("Location: index");
    }
    
    public function regformAction() {
        $v = new View('registration.php');
        $v->render($nothing);
    }
    
    public function registrationAction() {
        $app = new App();
        $username = $app->request->input->get('username');
        $login = $app->request->input->get('login');
        $psw1 = $app->request->input->get('password1');
        $psw2 = $app->request->input->get('password2');
        if($psw1 === $psw2) {
            $model = new Model();
            $model->addUser($username, $login, $psw1);
            $v = new View('login.php');
            $v->render($username);
        } else {
            $v = new View('registration.php');
            $v->render([$username, $login]);
        }
    }
    
}

















