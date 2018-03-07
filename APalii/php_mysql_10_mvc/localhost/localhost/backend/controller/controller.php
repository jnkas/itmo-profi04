<?php
class Controller {
    public function index() {
        $mdl = new Model();
        $view = new View();
        $result = $mdl->getPage();
        // response
        $view->render($result, 'index.tpl');
        
        
    }
   

}