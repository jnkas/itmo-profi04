<div class="container jumbotron well">

    <div class="warning">
        <form method='post' action=''>
            <input type='submit' class='btn btn-danger' value='УДАЛИТЬ этот рецепт' name='DELETE' />
        
        </form>
    <br><br>
    </div>
    <div class="row">
        <div class ="instructions col-md-12">
            <b>Изменить рецепт:</b><br>поставьте курсор в нужное поле и нажмите кнопку, чтобы Изменить название, Добавить ингредиенты или Удалить ингредиенты из рецепта.
        </div>
    </div>
    
         
        <div class= 'row'>
            <h3>
            <form method='post' action='' onsubmit="return confirm('Точно хотите изменить рецепт?');">
                <div class= 'form-group'>
                    <div class="row">
                        <div class="col-md-4">
                            <label for = 'title'>Переименовать</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <?php
                            echo "<input type='text' value='" . $recipeTitle . "' name='title' id='title' class='form-control input-lg' />\n";
                            echo "<input type='hidden' value='". $id ."' name='id' />";
                            ?>
                        </div>
                    </div>
                </div>
                <div class= 'form-group'>
                <input type='submit' class='btn btn-warning' value='Переименовать' />
                </div>
            </form>
          </h3>
        </div>


    
  
    

        <div class='row'>
           <h4>
            <form method='post' action='' onsubmit="return confirm('Точно хотите изменить описание?');">
                <div class='form-group'>
                    <div class="row">
                        <div class="col-md-12">
                            <label for = 'description'>Изменить описание</label><br>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <textarea  name='description' class='form-control' ><?php echo nl2br($description);?></textarea>
                            <?php echo "<input type='hidden' value='". $id ."' name='id' />";
                            ?>
                        </div>
                    </div>
                </div>
                <div class= 'form-group'>
                <input type='submit' class='btn btn-warning' value='Изменить описание' />
                </div>
            </form>
          </h4>
        </div>

    
    
    <h3>
        <div class= 'row'>
            <div class="col-md-4">
                <label for = 'image'>Новое фото</label>

                <img src='<?php $image = get_image($db, $id);
                  foreach($image as $item){ 
                    if($item != 'NULL'){
                        echo $item;
                    }else{
                        echo "/images/No_Image_Taken.jpg";
                    }
                  }
                  ?>' alt="Картинка <?php echo $recipeTitle.' '.$description; ?>" class="img-responsive">
            </div>
        </div>
    </h3>
    <div class= 'row'>
        <div class="col-md-4">
            <?php
            if($image['img_src'] == "NULL"){
                $image['img_src'] = "/images/No_Image_Taken.jpg";
            }
            echo "<form method='post' action='' onsubmit='return confirm(\'Обновить картинку?\');>";
            echo "<div class='form-group'>";
            echo "<input type='text' value='" . $image['img_src'] . "' name='image' id='image' class=' form-control input-md'>";
            echo "</div>";
            ?>
            <input type='hidden' value='". $id ."' name='id' />
            
            <div class= 'form-group'>
                <input type='submit' class='btn btn-warning' value='Обновить кратинку' />
            </div>
            <?php echo "</form>"; ?>
        </div>
    </div>
    <h4>    
        <form method='post' action=''>

            <div class='row'>
                <label for = 'addIngredient'>Добавить новый ингредиент</label>   

            </div>
            <div class='row'>
                <div class='col-md-2'>
                    <input type='text' name='amount' placeholder='1' name='amount' class='form-control' aria-describedby='helpAmount'/>
                    <span id='helpAmount' class='help-block'>Количество</span>
                </div>

                <div class='col-md-2'>
                    <input type='text' placeholder='ст' name='measurement' class='form-control' aria-describedby='helpMeasurement'/>
                    <span id='helpMeasurement' class='help-block'>Ед. измерения</span>
                </div>

                <div class='col-md-4'>
                    <input type='text' placeholder='Вода' name='addIngredient' id='addIngredient' class='form-control' aria-describedby='helpIngredient'/>
                    <span id='helpIngredient' class='help-block'>Ингредиент</span>
                </div>
            </div>
            <div class='row'>
                <div class='col-md-4'>
                    <input type='submit' class='btn btn-warning' value='Добавить ингредиент' />

                </div>
            </div>
        </form>
    </h4>
    <hr>
    <table>
        <tr>
        <th>Список ингредиентов</th>
        </tr>
        <tr>
           <td>  
            </td>
        </tr>
    </table>
    <table class='table'>    
        <?php 
        $ingredients = get_ingredients($db, $id);
        foreach ($ingredients as $item){
            
            echo "<tr><td>";
            echo "<form method='post' action='' 
                 onsubmit=\"return confirm('Уверены, что хотите удалить этот ингредиент?');\">\n";
            echo $item['ingredient']." - ";
            echo $item['amount']." ";
            if($item['measurement'] != "NULL"){echo $item['measurement'];}

            echo "<input type='hidden' value='" . $item['ingredient'] . "' name='deleteIngredient' />\n";
            echo "</td><td>";
            echo "<input type='submit' class='btn btn-danger' value='Удалить ". $item['ingredient']."' />\n";
            echo "</form>";
            echo "</td></tr>";
        }
        ?>
    </table>
    <br>
</div>