<?php
class Controller {

	public function getMenu() {
        $view = new View();   
        $view->render('menuForm.tpl');

    }    

    public function addAction() {
        $view = new View();   
        $view->render('addForm.tpl');        
    }

    public function addActionHelper() {
        $mdl = new Model();
        $result = $mdl->addPageHelper($_POST['file_name'], $_POST['file_content']);
        $view = new View(); 
        $view->render('index.tpl', $result);
    }

     public function deleteAction() {
        $mdl = new Model();
        $view = new View();
        $result = $mdl->getFileList();
        // response
        $view->render('deleteForm.tpl', $result);    
    }

    public function deleteActionHelper() {
    	$mdl = new Model();
        $result = $mdl->deletePageHelper($_POST['file_id']);
        $view = new View(); 
        $view->render('index.tpl', $result);	
    }

     public function getAction() {
        $mdl = new Model();
        $view = new View();
        $result = $mdl->getFileList();
        // response
        $view->render('getForm.tpl', $result);    
    }

    public function getActionHelper() {
    	$mdl = new Model();
        $result = $mdl->getPageHelper($_POST['file_id']);
        $view = new View(); 
        $view->render('index.tpl', $result);	
    }

     public function editAction() {
        $mdl = new Model();
        $view = new View();
        $result = $mdl->getFileList();
        // response
        $view->render('editForm.tpl', $result);          
    }

    public function editgetActionHelper() {
    	$mdl = new Model();
        $result = $mdl->getPageHelper($_POST['file_id']);
        $view = new View(); 
        $view->render('editForm2.tpl', ["content" => $result['text'], "id" => $_POST['file_id']]);	
    }

    public function edituploadActionHelper() {
    	$mdl = new Model();
        $result = $mdl->editPage($_POST['file_id'], $_POST['file_content']);
        $view = new View(); 
        $view->render('index.tpl', $result);	
    }

}
