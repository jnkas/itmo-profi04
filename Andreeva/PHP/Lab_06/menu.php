<?php

include 'config.php';

foreach($mass as $key => $value) {
    if(file_exists($key)) {
        echo '<li>'.$value;
        $arr = scandir($key);
        echo '<ul class="sub_menu">';
            foreach($arr as $link) {
                if($link !== '.' && $link !== '..') {
                    echo '<li><a href="' . $key . '/' . $link . '">' . basename($link, '.php') . '</a></li>';
                }
            }
        echo '</ul></li>';
    }
}

?>