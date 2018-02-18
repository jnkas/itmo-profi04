<?php

class Controller {
//Управление страницами
    
    public function index() {
        //Create page with empty table
        $view = new View('grid.tpl');
        $view->renderPage();
        }
    
    public function get(){
        //Get list of records
        $request = new Request();
        $post = $request->post->postArray;
        
        $mdl = new Model();
        $result = $mdl->getData($post);
        $view = new View();
        $view->dataToTable($result);
    }
    
    public function getCount(){
        $mdl = new Model();
        $result = $mdl->getRecCount();
    }
    
    public function add() {
        $request = new Request();
        $post = $request->post->postArray;
        $mdl = new Model();
        $mdl->insertRecord($post); 
    }
    
    public function save() {
        $request = new Request();
        $post = $request->post->postArray;
        $mdl = new Model();
        $mdl->updateRecord($post);
    }
    
    public function delete() {
        $request = new Request();
        $id = $request->post->readPost('id');
        var_dump($id);
        $mdl = new Model();
        $mdl->deleteRecord($id);
    }

} 