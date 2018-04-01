


<?php

include 'config.php';

echo '<ul class="menu">';
foreach($arrCategories as $key => $value) {
    if(file_exists('categories/'.$key)) {
        
        echo '<li id="categ"><span class="category_name">' .$value. '</span>';
		echo '<ul class="submenu">';
        $arr = scandir('categories/'.$key);
        
        foreach($arr as $link) {
            if($link !== '.' && $link !== '..') {
                echo '<li><a href="categories/' .$key. '/' .$link. '">' .basename($link, '.php'). '</a></li>';
            }
        }
		echo '</ul>';
        echo '</li>';
    }
}

echo '</ul>';
?>