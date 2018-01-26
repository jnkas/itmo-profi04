<?php

class Controller {
    public static function indexAction(){
      	$mdl = new Model();
		$data = $mdl->change();
        $v = new View();
        $v ->render($data, '././forum_page.php');
    }
}