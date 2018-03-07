<?php
//echo __DIR__;

spl_autoload_register(function ($class_name) {
	///echo $class_name;
	$directorys = [
            'backend/view/',
            'backend/model/',
            'backend/controller/',            
        ];
    foreach($directorys as $directory)
        {
       echo $directory.$class_name . '.php';
       echo "</br>";
          //see if the file exsists
          if(file_exists($directory.$class_name . '.php'))
          {
              require_once($directory.$class_name . '.php');
              //only require the class once, so quit after to save effort (if you got more, then name them something else 
              return;
            }  else {
              echo "Класс ".$class_name ." не найден.";
            }          
      }
    //include $class_name . '.php';
});