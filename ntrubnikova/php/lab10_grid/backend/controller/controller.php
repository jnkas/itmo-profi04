<?php

class Controller {
//Управление страницами
    private $table;
    private $order;
    private $idField;
    
    public function __construct($table, $orderBy, $idField){
        $this->table = $table; //Table name
        $this->order = $orderBy; //Column by which returned records must be ordered
        $this->idField = $idField; //Unique field by which record must be picked for deletion
    }
    
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
        $result = $mdl->getData($post, $this->table, $this->order);
        $view = new View();
        $view->dataToTable($result);
    }
    
    public function getCount(){
        $mdl = new Model();
        $result = $mdl->getRecCount($this->table);
    }
    
    public function getLast(){
        $mdl = new Model();
        $result = $mdl->getLastRec($this->table, $this->idField);
    }
    
    public function add() {
        $request = new Request();
        $post = $request->post->postArray;
        $mdl = new Model();
        $mdl->insertRecord($post, $this->table); 
    }
    
    public function save() {
        $request = new Request();
        $post = $request->post->postArray;
        $mdl = new Model();
        $mdl->updateRecord($post, $this->table);
    }
    
    public function delete() {
        $request = new Request();
        $idValue = $request->post->readPost($this->idField);
        
        $mdl = new Model();
        $mdl->deleteRecord($this->idField, $idValue, $this->table);
    }

} 