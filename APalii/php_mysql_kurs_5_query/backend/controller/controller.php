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
    public function getTableq1() {
        $mdl = new Model(); 
        $result = $mdl->getTableq1();     
        echo $result;
    }

    public function getTableq2() {
        $mdl = new Model(); 
        $result = $mdl->getTableq2();     
        echo $result;
    }
    public function getTableq3() {
        $mdl = new Model(); 
        $data = $mdl->getTableq3();
        $view = new View("options.tpl"); 
        $result = $view->render($data);     
        echo $result;
    }

    public function getTable3rd_selector() {
        $mdl = new Model(); 
        $result = $mdl->getTableq3_1($_POST['tariff_id']);     
        echo $result;
    }


    public function getTableq4() {
        $mdl = new Model(); 
        $result = $mdl->getTableq4();     
        echo $result;
    }

    public function getTableq5() {
        $mdl = new Model(); 
        $result = $mdl->getTableq5();     
        echo $result;
    }

}