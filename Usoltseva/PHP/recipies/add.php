<?php
$add_recipe = 'selected';
require 'inc/config.php';
require 'inc/functions.php';
require 'inc/header.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Подтвреждена главная форма рецепта...
    if(isset($_POST['recipe'])){
        // Записать в базу
        $title = trim(filter_input(INPUT_POST,'title',FILTER_SANITIZE_STRING));
        $description = trim(filter_input(INPUT_POST,'description',FILTER_SANITIZE_STRING));
        $cook_time = trim(filter_input(INPUT_POST,'cook_time',FILTER_SANITIZE_STRING));
        $img_src = trim(filter_input(INPUT_POST,'img_src',FILTER_SANITIZE_STRING));


        // пустые поля записываются как "NULL"
        if($img_src != ""){
            $img_src = '/images/'.$img_src;
        }else{
            $img_src = "NULL";
        }

         // проверка, что Название и Описание - не пустые
        if(!empty($title) && !empty($description)){
            $title=ucwords($title);
            $description = ucwords($description);
            // Добваить рецепт в базу
            if(add_recipe($db, $title, $description, $cook_time, $img_src)){
            }
        }else{
            // Показать сообщение, если подтверждена отправка формы с пустыми обязательными полями
            $error_message = 'Не могу добавить рецепт - заполните обязательные поля. ';
            echo '<div class="status"><h2>';
            echo $error_message;
            echo '</h2></div>'; 
            
        }
    }//конец if(isset($_POST['recipe']))
    
    // если ингредиент успешно добавлен...
    if(isset($_POST['formIngredient'])){
        $recipe_id = '';

        // функция, определяющая наибольший ID в таблице в базе
        $id = get_last_id($db);
        // преобразовать id в целое число
        $recipe_id =intval($id['id']);
        
        // форма отправки ингредиента подтверждена, далее...
        if($_POST['formIngredient'] == 'addFormIngredient'){
            // сохранить содеражне полей в базу
            $ingredient = trim(filter_input(INPUT_POST,'ingredient',FILTER_SANITIZE_STRING));
            $amount = trim(filter_input(INPUT_POST,'amount',FILTER_SANITIZE_STRING));
            $measurement = trim(filter_input(INPUT_POST,'measurement',FILTER_SANITIZE_STRING));
                        
            // проверка, что ингредиент и количество не пустые
            if(!empty($ingredient) && !empty($amount)){
                $ingredient = ucwords($ingredient);
                // добавить в таблицу
                if(add_ingredient($db, $recipe_id, $ingredient, $amount, $measurement)){
                    $status = 'Ингредиент '.$ingredient.' добавлен.';
                    // отобразить пустыую форму добалвения
                    $ingredient = $amount = $measurement = '';
                }else{
                    $status = 'не могу добавить ингредиент: '.$ingredient;
                }
            }else{
                $status = "Заполните Наименование и Количество";
            }
            // Показать статус после подтверждения
            echo '<h2><div class="status">';
            echo $status;
            echo '</h2></div>';
        }
    }

}// конец if($_SERVER["REQUEST_METHOD"] == "POST")

// если поля Название рецепта и Описание - пустые, отобразить
if ((empty($title) || empty($description)) && !isset($_POST['ingredient'])){
    include 'inc/add-recipe.php';
}else{
    // показать форму добалвения ингредиента
    include 'inc/add-ingredient.php';
}
?>

