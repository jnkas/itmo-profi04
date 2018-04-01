<?php

function get_all_recipe_titles($db){
    try{
        $query = 'SELECT title, recipe_id
                    FROM recipe';
        $statement = $db->query($query);
        $result = $statement->fetchALL();
    }catch(Exception $e){
        echo "Не могу показать все рецепты";
        exit;
    }
    return $result;
}



function get_title($db, $id){
    try{
        $query = 'SELECT title
                    FROM recipe
                    WHERE recipe_id = :id';
        
        $statement = $db->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
    }catch(Exception $e){
        echo "Не могу показать название";
        exit;
    }
    $title = $statement->fetch(PDO::FETCH_ASSOC);
    foreach($title as $item){
        return $item;
    }
    
}

function set_title($db, $title, $id){
    try{
        $query = 'UPDATE recipe 
                    SET title = :title
                    WHERE recipe_id = :id';
        $statement = $db->prepare($query);
        $statement->bindParam(':title',$title, PDO::PARAM_STR);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
    }catch(Exception $e){
        echo "Не смог переименовать";
        exit;
    }
    return true;
    
}

function get_description($db, $id){
    try{
        $query = 'SELECT description
                    FROM recipe
                    WHERE recipe_id = :id';
        
        $statement = $db->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
    }catch(Exception $e){
        echo "Не могу показать Название рецепты";
        exit;
    }
    $description = $statement->fetch(PDO::FETCH_ASSOC);
    foreach($description as $item){
        return $item;
    }
    
}

function set_description($db, $description, $id){
    try{
        $query = 'UPDATE recipe 
                    SET description = :description
                    WHERE recipe_id = :id';
        $statement = $db->prepare($query);
        $statement->bindParam(':description',$description, PDO::PARAM_STR);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
    }catch(Exception $e){
        return false;
    }
    return true;
    
}

function get_image($db, $id){
    try{
        $query = 'SELECT img_src
                    FROM recipe
                    WHERE recipe_id = :id';
        
        $statement = $db->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
    }catch(Exception $e){
        echo "Не могу показать картинку. Ее, похоже, нет";
        exit;
    }
    return $statement->fetch(PDO::FETCH_ASSOC);    
}

function set_image($db, $image, $id){
    try{
        $query = 'UPDATE recipe 
                    SET img_src = :image
                    WHERE recipe_id = :id';
        $statement = $db->prepare($query);
        $statement->bindParam(':image',$image, PDO::PARAM_STR);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
    }catch(Exception $e){
        return false;
    }
    return true;
}

function get_ingredients($db, $id){
    try{
    $query = 'SELECT ingredient, amount, measurement
    			FROM ingredients
    			WHERE recipe_id = :id';

    $statement = $db->prepare($query);
    $statement->bindParam(':id', $id,PDO::PARAM_INT);
    $statement->execute();
    }catch(Exception $e){
        echo "Не могу отобразить Ингредиенты";
        exit;
    
    }

    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function get_all_distinct_ingredients($db){
    try{
        $query = 'SELECT distinct ingredient
                    FROM ingredients
                    ORDER BY ingredient ASC';
        
    $statement = $db->query($query);
    $ingredients = $statement->fetchAll();
    }catch(Exception $e){
        echo "Не могу отобразить Ингредиенты. ".$e->getMessage();
        exit;
    }
    return $ingredients;
}

function add_ingredient($db, $recipe_id, $ingredient, $amount, $measurement){
    $query = 'INSERT INTO ingredients(recipe_id,ingredient, amount, measurement)
                VALUES(:recipe_id, :ingredient, :amount, :measurement)';
    
    try{
        $statement = $db->prepare($query);
        $statement->bindParam(':recipe_id', $recipe_id, PDO::PARAM_INT);
        $statement->bindParam(':ingredient', $ingredient, PDO::PARAM_STR);
        $statement->bindParam(':amount', $amount, PDO::PARAM_INT);
        $statement->bindParam(':measurement', $measurement, PDO::PARAM_STR);
        $statement->execute();
    }catch(Exception $e){
        echo "Не могу добавить этот ингредиент. ".$e->getMessage();
        exit;
    }
    return true;
}

function delete_ingredient($db, $id, $ingredient){
    $query = "DELETE FROM ingredients
                WHERE recipe_id = :id AND ingredient = :ingredient";
    try{
        $statement = $db->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->bindParam(':ingredient', $ingredient, PDO::PARAM_STR);
        $statement->execute();        
    }catch(Exception $e){
        echo "Не могу удалить этот ингредиент. ".$e->getMessage();
        exit;
    }
    return true;
}

function add_recipe($db, $title, $description, $cook_time, $img_src ){
    $query = 'INSERT INTO recipe(title,description, cook_time, img_src)
                VALUES(:title, :description, :cook_time, :img_src)';
    
    try{
        $statement = $db->prepare($query);
        $statement->bindParam(':title', $title, PDO::PARAM_STR);
        $statement->bindParam(':description', $description, PDO::PARAM_STR);
        $statement->bindParam(':cook_time', $cook_time, PDO::PARAM_STR);
        $statement->bindParam(':img_src', $img_src, PDO::PARAM_STR);
        $statement->execute();
    }catch(Exception $e){
        return false;
    }
    return true;
}

function delete_recipe($db, $id){
    try{
        $query1 = 'DELETE FROM recipe
                WHERE recipe_id = :id';
        $statement = $db->prepare($query1);
        $statement->bindParam(':id',$id, PDO::PARAM_INT);
        $statement->execute();
    }catch (Exception $e){
        echo "Не удалось удалить этот рецепт";
        return false;
    }
    try{
        $query2 = 'DELETE FROM ingredients
                WHERE recipe_id = :id';
        $statement = $db->prepare($query2);
        $statement->bindParam(':id',$id, PDO::PARAM_INT);
        $statement->execute();
    }catch (Exception $e){
        echo "Не получилось удалить рецепт";
        return false;
    }
    return true;
}

function get_cook_time($db, $id){
    $query = 'SELECT cook_time
              FROM recipe
              WHERE recipe_id = :id';
    
    try{
        $statement = $db->prepare($query);
        $statement->bindParam(':id',$id,PDO::PARAM_INT);
        $statement->execute();
    }catch(Exception $e){
        echo "Не могу отобразить время приготовления";
        exit;
    }
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}


function is_id_valid($db, $id){
    $query = 'SELECT recipe_id
            FROM recipe
            WHERE recipe_id = :id';
    try{
        $statement = $db->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
    }catch(Exception $e){
        return false;
    }
    return $statement->fetch();
}

function get_last_id($db){
    $sql = 'SELECT max(recipe_id) AS id
                FROM recipe';
    
    try{
        $statement = $db->query($sql);
    }catch(Exception $e){
        echo "Не могу определить последний ID";
        exit;
    }
    $result = $statement->fetch();
    return $result;
}

function random_recipe($db){
    $sql = 'SELECT recipe_id, img_src, title
                FROM recipe
                WHERE img_src NOT IN("/images/image.jpg","/images/","NULL")
                ORDER BY RAND()
                LIMIT 3';
    
    try{
        $statement = $db->query($sql);
    }catch(Exception $e){
        echo "Не могу достать случайный рецепт";
        exit;
    }
    $result = $statement->fetchAll();
    return $result;
}

function search_recipe($db, $search_term){
    $sql = 'SELECT distinct(recipe.title), recipe.recipe_id
            FROM recipe INNER JOIN ingredients
            ON recipe.recipe_id = ingredients.recipe_id
            WHERE recipe.title LIKE :search OR ingredients.ingredient LIKE :search';
    try{
        $statement = $db->prepare($sql);
        
        $statement->bindParam(':search', $search_term, PDO::PARAM_STR);
        $statement->execute();
    }catch(Exception $e){
        echo "Не могу найти: ".$e->getMessage();
        exit;
    }
    $result = $statement->fetchAll();
    return $result;
}
?>

