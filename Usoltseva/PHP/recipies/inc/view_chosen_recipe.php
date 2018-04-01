<div class=" jumbotron well">
    <div class="container">
        <h1><?php echo $recipeTitle; ?></h1>
        
        <div class="container">
            <div class="col-md-3" style="padding-left: 0px;  padding-right: 0px; padding-top: 15px;">
                <img src='<?php
                    $image = get_image($db, $id);
                    foreach($image as $item){
                        if($item != 'NULL' && $item !=""){
                              echo $item;
                        }else{
                            echo "/images/No_Image_Taken.jpg";
                        }
                    }
                ?>' alt="'Фото <?php echo $recipeTitle; ?>" class="img-responsive">
                        <br> 
                        
                <a href="modify-recipe.php?id=<?php echo $id; ?>"><div class="button--delete">Изменить (удалить) рецепт</div></a>
            </div> <!-- col-md-3 div-->
            <div class="col-md-4">
                <table class="table table-striped">
                    <thead>
                        <tr >
                            <th style="padding-top: 15px;">Ингредиенты</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $ingredients = get_ingredients($db, $id);
                        foreach ($ingredients as $item){
                            echo "<tr><td>";
                            echo $item['ingredient']." - ";
                            echo $item['amount']." ";
                            if ($item['measurement'] != "NULL"){
                              echo $item['measurement']." ";  
                            }
                            echo "</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>  <!--  col-md-3 div-->
            <div class="col-md-5">
                <br><b>Время приготовления: </b>
                    <?php 
                    $cookTime = get_cook_time($db, $id);
                    foreach ($cookTime as $item){
                        echo $item['cook_time'];
                                       }
                    ?>
                <br>
                <br>
                <b>Описание рецепта:</b>
             
                <?php echo nl2br($description);
                ?>
            </div>  <!--  col-md-4 div-->
        </div>  <!--  container-fluid div -->
        
    </div> <!--  Recipe div -->
</div> <!--  Jumbotron Well div -->
