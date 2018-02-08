<?php

class Controller {
//Управление страницами
    public function index() {
        $mdl = new Model();
        session_start();
        $auth = new Authorization();
        if ($auth->isAuth()){
            $view = new View('showAllPages.tpl');
            $allPages = $mdl->getAllPages();
            $view->renderPage($allPages);
        }
        else {
            $this->authorize();
        }
    }
    
    public function view() {
        $request = new Request();
        $mdl = new Model();
        $allPages = $mdl->getAllPages();
        $page = $mdl->getPageById($allPages, $request->post);
        $view = new View('viewPage.tpl');
        $view->renderPage($page);
    }
    
    public function add() {
        session_start();
        $auth = new Authorization();
        if ($auth->isAuth()){
            $view = new View('addPage.tpl');
            $view->renderPage();
        }
        else {
            $this->authorize();
        }
        
    }
    
    public function saveNewPage(){
        $request = new Request();
        $mdl = new Model();
        $allPages = $mdl->getAllPages();
        $mdl->saveNewPage($allPages,$request->post, $request->server);
    }
    
    public function edit(){
        $request = new Request();
        $mdl = new Model();
        
        session_start();
        $auth = new Authorization();
        if ($auth->isAuth()){
            $allPages = $mdl->getAllPages();
            $page = $mdl->editPage($allPages, $request->post);
            $view = new View('editPage.tpl');
            $view->renderPage($page);
        }
        else {
            $this->authorize();
        }
        
    }
    
    public function saveModifiedPage(){
        $request = new Request();
        $mdl = new Model();
        $allPages = $mdl->getAllPages();
        $mdl->saveModifiedPage($allPages,$request->post, $request->server);
    }

    public function delete(){
        $mdl = new Model();
        $allPages = $mdl->getAllPages();
        $request = new Request();
        $mdl->deletePage($allPages, $request->post, $request->server);
    }
    
//Авторизация
    public function authorize(){
        $view = new View('authForm.tpl');
        $view->renderPage();
    }
    
    public function register(){
        $view = new View('regForm.tpl');
        $view->renderPage();
    }
    
    public function saveUser(){
        $request = new Request();
        $login = $request->post->readPost('login');
        $password = md5($request->post->readPost('password'));
        
        $mdl = new UserModel();
        $result = $mdl->saveUser($login, $password);
        if ($result == 'registered') {
            $page = ['error'=>'Пользователь зарегистрирован, войдите'];
            $view = new View('authForm.tpl');
            $view->renderPage($page);
        }
    }
    
    public function login(){
        $request = new Request(); 
        $login = $request->post->readPost('login');
        $password = $request->post->readPost('password');
        
        session_start();
        $auth = new Authorization($login, $password);
        $auth->verification();
        if ($auth->verification() == 'verified') {
            $this->index();
        }
        else {
            $page = ['error'=>$auth->verification()];
            $view = new View('authForm.tpl');
            $view->renderPage($page);
        }
    }
    
    public function logout(){
        session_start();
        $auth = new Authorization($login, $password);
        $auth->logout();
        $this->authorize();
    }
    
}