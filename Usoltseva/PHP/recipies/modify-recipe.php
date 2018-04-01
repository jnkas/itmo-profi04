<?php

$modify_recipe = 'selected';

require 'inc/functions.php';
require 'inc/config.php';
require 'inc/header.php';
$addIngredient = '';
$status = '';

if(isset($_GET['id']) && is_id_valid($db, $_GET['id'])){
    
    $id = $_GET['id'];
        if(get_title($db, $id)){
            // Достать наименование из базы
            $recipeTitle = get_title($db, $id);
            // Достать описание из базы
            $description = get_description($db, $id); 
        }else{
            $id='';
        }
}else{
    // невалидный id рецепта
    $id = '';
    //показать 'inc/select_recipe_to_modify.php' для неправильного ID
}

// Команда - переименовать рецепт    
if(isset($_POST['title'])){
    $title = trim(filter_input(INPUT_POST,'title',FILTER_SANITIZE_STRING));
    $title = ucwords($title);
    // Записать новое название в базу
    if(set_title($db, $title, $id)){
        $recipeTitle = get_title($db, $id);
        $status = 'Переименовал';
    }else{
        $status = 'не могу переименовать';
    }    
}

// Обновить описание     
if(isset($_POST['description'])){
    $sub = trim(filter_input(INPUT_POST,'description',FILTER_SANITIZE_STRING));
    $sub = ucwords($sub);
    //записать в базу
    if(set_description($db, $sub, $id)){
        $description = get_description($db, $id);
        $status = 'Описание обновилось';
    }else{
        $status = 'Не могу обновить описание';
    }    
}

// Команда - обновить картинку
if(isset($_POST['image'])){
    $img = trim(filter_input(INPUT_POST,'image',FILTER_SANITIZE_STRING));
    // Записать картинку в базу
    if(set_image($db, $img, $id)){
        $status = 'картинка обновилась';
    }else{
        $status = 'Не могу обновить картинку';
    }
}
// Нажата кнопка Добавить ингредиент
if(isset($_POST['addIngredient'])){
    $addIngredient = trim(filter_input(INPUT_POST,'addIngredient',FILTER_SANITIZE_STRING));
    $amount = trim(filter_input(INPUT_POST,'amount',FILTER_SANITIZE_STRING));
    $measurement = trim(filter_input(INPUT_POST,'measurement',FILTER_SANITIZE_STRING));
    $addIngredient = ucwords($addIngredient);
    //записать ингредиент в базу
    if(add_ingredient($db, $id, $addIngredient, $amount, $measurement)){
        $status = 'Ингредиент '.$addIngredient.' добавлен';
    }else{
        $status = 'Не могу добавить ингредиент';
    }
} 
//Если пользователь просит удалить ингредиент
if(isset($_POST['deleteIngredient'])){
    $ingredient = $_POST['deleteIngredient'];
    //Удалить ингредиент из базы
    if(delete_ingredient($db, $id,$ingredient)){
        $status = 'Ингредиент '.$ingredient.' удален';
    }else{
        $status = 'Не могу удалить ингредиент';
    }
}

//Если пользователь просит удалить рецепт  
if(isset($_POST['DELETE'])){
    //удалить рецепт из базы
    if(delete_recipe($db, $id)){
        $status = 'Рецепт удален';
    }else{
        $status = "Рецепт НЕ удален";
    }
    
}

//Отобразить статус
echo "<div class='status'><h2>".$status."</h2></div>";




if(isset($_GET['id']) && is_id_valid($db, $_GET['id'])){
////Выбран рецепт + валидный ID////
    require 'inc/modify_chosen_recipe.php';
    }else{
    ////Если рецепт не выбран, отобразить////
    require 'inc/select_recipe_to_modify.php';
    } 
?>
<?php require 'inc/footer.php'; ?>