<?php

include "config.php";

$catMenu = '<div class="header">';

foreach ($cats as $value) {
    $dir = '../'. array_search($value, $cats);
    $files = '';
    
    if (is_dir($dir)) {
        $files = array_slice(scandir($dir), 2);
        $filesHTML = '';
        
        foreach ($files as $val) {
            $buffer = explode("\n",file_get_contents($dir. '/' .$val));
            $name = strip_tags($buffer[4]);
            $filesHTML .= '<a href="'. $dir. '/'. $val. '">'. $name. '</a>';
        };
        
        $catMenu .= '<div class="dropdown">
          <button class="category">'. $value. '</button>
          <div class="pages">'. $filesHTML. '</div></div>';
   }
}

$catMenu .= '</div>';
echo $catMenu;
?>



