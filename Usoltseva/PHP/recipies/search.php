<?php

$search_page = 'selected';

require 'inc/header.php';
require 'inc/config.php';
require 'inc/functions.php';


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $search = trim(filter_input(INPUT_POST,'search',FILTER_SANITIZE_STRING));

    $search_term = '%'.$search.'%';
}
?>
<!--Еще одна поисковая форма-->
<div class="jumbotron well">
    <form method="post" action="">
        <input type="text" name="search" id="search" />
        <input type="submit" class="btn" value="Искать">
    </form>
</div>

<?php
// Результаты поиска
if ($_SERVER["REQUEST_METHOD"]  == "POST"){
?>    
<div class="jumbotron well">
    <h1>Результаты поиска</h1>
    <h3>
         <?php if($search == ''){
                echo "Все рецепты:";
            }
            else{
                echo 'для "'.$search.'"';
            }?>
    </h3>
    
    <!-- Поиск по базе данных по заданому условию-->
    <?php $searchRecipes = search_recipe($db,$search_term); ?>
        <?php
            $i=1;
            foreach($searchRecipes as $item){
                echo $i.") <a href='recipies/index.php?id=".$item['recipe_id']."'>".$item['title']."</a>";
                echo "<br>";
                $i++;
            }
        ?>
</div>
<div class = "container">
    <h2>Список всех ингредиентов</h2>
    <?php $ingredient_list = get_all_distinct_ingredients($db); 
        $i=1;
        echo "<div class = 'col-md-4'>";
        foreach($ingredient_list as $item){
        
        echo "<form action='search.php' method='post'><input type='submit' value='".$item['ingredient']."' name='search' /></form><br>";
        
            //после того как отобразились 10 штук, создать новый div
            if ( is_int($i/10)){
                echo "<br><br></div><div class = 'col-md-4'>";
            }
        $i++;
        }    
        echo "</div>";
    ?>
                                           
</div>
<?php } ?>

<?php require 'inc/footer.php'; ?>
