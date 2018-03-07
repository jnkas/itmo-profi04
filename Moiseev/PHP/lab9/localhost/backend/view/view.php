<?php
//первая версия
/*class View {
    public function render($data, $tmplt_name) {
        include $tmplt_name;
        
    }
}*/

//вторая версия
define('TEMPLATE_PATH' , './asset/tpl/');

class View {
    private $template;	
    public  $content;
    
    public function __construct($tmpl) {
    	$this->template = $tmpl;
    }

    //public function render(Array $data) {
    public function render($data) {
    	//extract($data);
    	//echo "render";
        ob_start();
        try {
            include( TEMPLATE_PATH.$this->template );
        } catch (Exception $e) {
        	// место где ошибка записывается в логер
        	echo "файл не найден";
        }
        $content = ob_get_contents();
        ob_end_clean();
        $this->content = $content; 
        echo $this->content;
        //return $this->content;
    }
    public function getJson() {
    	return json_encode(['content' => $this->content]);
    }
    public function getHTML() {
    	return  $this->content;
    }
}