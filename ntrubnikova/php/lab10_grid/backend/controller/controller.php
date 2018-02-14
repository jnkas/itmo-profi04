<?php

class Controller {
//Управление страницами
    
    public function index() {
        //Get list of users
        $mdl = new Model();
        $result = $mdl->getData();

        //Create page with table rows
        $view = new View('grid.tpl');
        $table = $view->dataToTable($result);
        $view->renderPage($table);
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