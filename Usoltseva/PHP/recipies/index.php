<?php

$view_recipe = 'selected';
require 'inc/functions.php';
require 'inc/config.php';


if(isset($_GET['id']) && is_id_valid($db, $_GET['id'])){
    $id = $_GET['id'];
        //получить описание рецепта из базы
        if(get_title($db, $id)){
            $recipeTitle = get_title($db, $id);
            $description = get_description($db, $id);    
        }else{
            $id='';
        }            
}else{
    $id = '';
}

require 'inc/header.php';

?>
<?php
if(isset($_GET['id']) && is_id_valid($db, $id)){
//показать рецепт по id
    require 'inc/view_chosen_recipe.php';
}
else{  
//показать страницу выбора рецептов
    require 'inc/select_recipe_to_view.php';
} 
?>

<?php require 'inc/footer.php'; ?>