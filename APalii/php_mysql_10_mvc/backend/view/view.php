<?php

class View {
    public function render ($name_tpl, $data = null) {
    	$path = './asset/tpl/';
        include $path.$name_tpl;
        //  написать логику вывода шаблона 
       // echo $path.$name_tpl;
      //  echo $data['text'];
        
        
    }


}