<?php
class Controller {
    public function index() {
        $mdl = new Model();
        $view = new View('showAllPages.tpl');
//        $result = $mdl->getPage(); 
//        $view->render($result);
//        echo $view->getHTML(); 
        $allPages = $mdl->getAllPages();
        $view->renderPage($allPages);
    }
    
    public function add() {
        $view = new View('addPage.tpl');
        $view->renderPage();
    }
    
    public function addWritePage(){
        $request = new Request();
        $mdl = new Model();
        $allPages = $mdl->getAllPages();
        $mdl->savePage($allPages,$request->post, $request->server);
    }
    
    public function edit(){
        echo "Редактирование";
    }

    public function del(){
        echo "Удаление";
    }
    
}