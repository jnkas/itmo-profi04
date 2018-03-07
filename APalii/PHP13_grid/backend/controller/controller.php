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
    public function getClients() {
        $mdl = new Model(); 
        $result = $mdl->getClients();     
        echo $result;
    }

    public function insertItem() {
        $mdl = new Model(); 
        $result = $mdl->insertItem();     
        echo $result;
    }

    public function updateItem() {
        $mdl = new Model(); 
        $result = $mdl->updateItem();     
        echo $result;
    }

    public function deleteItem() {
        $mdl = new Model(); 
        $result = $mdl->deleteItem();     
        echo $result;
    }

}