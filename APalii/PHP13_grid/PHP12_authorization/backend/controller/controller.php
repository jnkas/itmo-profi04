<?php

class Debug {
	public static function log ($value , $descr='') {
		echo "<pre>";
        echo $descr;
        var_dump($value);
		echo "</pre>";
	}

}

class Controller {
    public function signUp() {
       
        $view = new View('signup.tpl');
        $view->render();
        echo $view->getHTML();              
    }

    public function addUser() {
        $mdl = new Model(); 
        $result = $mdl->addUser();  

        //$view = new View('result.tpl');
        //echo $view->render(['data' => $result]);
        echo $result;          
    }

    public function signIn() {
       
        $view = new View('signin.tpl');
        $view->render();
        echo $view->getHTML();              
    }

    public function validateUser() {
        $mdl = new Model(); 
        $result = $mdl->validateUser();  

        //$view = new View('result.tpl');
        //echo $view->render(['data' => $result]);
        echo $result;          
    }


}