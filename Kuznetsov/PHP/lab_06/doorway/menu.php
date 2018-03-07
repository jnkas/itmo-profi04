<?php

if(basename($_SERVER[ 'SCRIPT_NAME' ]) === 'index.php') {
    include 'config.php';

    foreach($categories as $key => $value) {
        if(file_exists($key)) {

            echo '<section><h3>' . $value . '</h3>';
            $arr = scandir($key);
            //genLinks($arr, $key);
            foreach($arr as $link) {
                if($link !== '.' && $link !== '..') {
                    echo '<a href="' . $key . '/' . $link . '">' . basename($link, '.php') . '</a><br>';
                }
            }
            echo '</section>';
        }
    }
} else {
    include '../config.php';

    foreach($categories as $key => $value) {
        if(file_exists("../{$key}")) {
            echo '<section><h3>' . $value . '</h3>';
            $arr = scandir("../{$key}");
            foreach($arr as $link) {
                if($link !== '.' && $link !== '..') {
                    echo '<a href="../' . $key . '/' . $link . '">' . basename($link, '.php') . '</a><br>';
                }
            }
            echo '</section>';
        }
    }    
}







?>