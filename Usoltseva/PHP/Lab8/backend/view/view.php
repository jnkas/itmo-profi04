<?php

define('TEMPLATE_PATH' , './asset/tpl/');

class View {
    private $template;	
    public  $content;
    public function __construct($tmpl) {
    	$this->template = $tmpl;
    }

//    public function render(Array $data) {
//    	extract($data);
//    	//echo "render";
//        
//        ob_start();
//        try {
//            include(TEMPLATE_PATH.$this->template);
//        } catch (Exception $e) {
//        	// место где ошибка записывается в логер
//        	echo "файл не найден";
//        }
//        $content = ob_get_contents();
//        ob_end_clean();
//        
//        $this->content = $content; 
//        //return $content;
//    }
    
    public function getJson() {
    	return json_encode(['content' => $this->content]);
    }
    
    public function getHTML() {
    	return  $this->content;
    }
    
    public function renderPage(Array $pagesArray = NULL) {
        if (!$pagesArray == NULL) {
            extract($pagesArray);
            }
        ob_start();
        try {
            include(TEMPLATE_PATH.$this->template);
        } catch (Exception $e) {
        	// место где ошибка записывается в логер
        	echo "файл не найден";
        }
        $content = ob_get_contents();
        ob_end_clean();
        echo $content;
    }
    
}




