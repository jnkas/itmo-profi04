<?php

class View {
    public function render ($data, $name_tpl) {
    	$path = './asset/tpl/';
        //  написать логику вывода шаблона 
       // echo $path.$name_tpl;
      //  echo $data['text'];
        include $path.$name_tpl;
        
    }


}