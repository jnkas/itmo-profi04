<?php
class Controller {
    public function index() {
        $mdl = new Model();
        $view = new View('showAllPages.tpl');
        $allPages = $mdl->getAllPages();
        $view->renderPage($allPages);
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
        $view = new View('addPage.tpl');
        $view->renderPage();
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
        $allPages = $mdl->getAllPages();
        $page = $mdl->editPage($allPages, $request->post);
        $view = new View('editPage.tpl');
        $view->renderPage($page);
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
    
}