<div class=" jumbotron well">
    <div class="container">
        <h1><?php 
            echo "Посмотреть рецепты"; 
            ?>
        </h1>
        <div class="row">
            <div class="col-md-4">
                <?php $allRecipes = get_all_recipe_titles($db);
                    asort($allRecipes); //Сортироавть в алфавитном порядке
                    $topRecipeInForm = array_values($allRecipes);
                ?>
                <form name="form" method="post" action='<?php echo "index.php?id=".$topRecipeInForm[0]['recipe_id']; ?>'>
                    <label for="selectRecipe">Выбрать рецепт из базы:</label>
                    <select name="selectRecipe" id="selectRecipe" class="form-control" onChange="go()">
                        <?php
                        foreach($allRecipes as $item){
                            echo "<option value='index.php?id=";
                            echo $item['recipe_id'];
                            echo "'>";
                            echo $item['title'];
                            echo "</option>";
                        }
                        ?>
                    </select>
                    <script type="text/javascript">
                        //перенаправляет на страницу с рецептом
                        function go(){
                        location= document.form.selectRecipe.
                        options[document.form.selectRecipe.selectedIndex].value
                        }
                    </script>
                    <br>
                    <input type="submit" name="findRecipe" class="btn" value="Загрузить" />
                </form>
            </div> <!-- col-md-4 -->
        </div><!-- row -->
        <h3>или выбрать случайный рецепт, нажав на картинку</h3>
        <div class="row">
             <ul>
                <?php
                $random = random_recipe($db);
                foreach ($random as $item) {
                    echo "<div class='col-md-4'>";
                    echo "<a href='index.php?id=".$item['recipe_id']."'>";
                    echo "<img src='".$item['img_src']."' title='".$item['title']."' alt='Картинка случайного рецепта' class='img-responsive'>";
                    echo "</a><br></div>";
                }
                ?>							
            </ul>
        </div><!--row -->
    </div><!-- container -->
</div><!-- jumbotron well -->
