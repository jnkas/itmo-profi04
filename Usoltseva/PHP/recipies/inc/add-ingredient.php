
<div class=" jumbotron well">
    <h1>Добавить ингредиент</h1>
    <form class="form-horizontal" action="" method="post">
        <div class="form-group">
            <label class="control-label col-sm-2" for="amount">Количество (обязательно)</label>
            <div class="col-sm-1">
                <input type="text" placeholder="1" class="form-control" name="amount" id="amount" value='<?php if(isset($amount)){ echo $amount;}?>' />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="measurement">Единицы измерения</label>
            <div class="col-sm-2">
                <input type="text" placeholder="ст/л" class="form-control" name="measurement" id="measurement" value="<?php if(isset($measurement)){ echo $measurement;}?>" />
                <span id="helpMeasurement" class="help-block">Например: ст, г, ч/л, и т.д.</span>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2"  for="ingredient">Наименование (обязательно)</label>
            <div class="col-sm-4">
                <input type="text" placeholder="Вода" class="form-control" name="ingredient" id="ingredient" value='<?php if(isset($ingredient)){ echo $ingredient;}?>'/>
            </div>
        </div>
        <input type="hidden" name="formIngredient" value="addFormIngredient" />
        <div class="form-group">        
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-success" value="Добавить игредиент" />
            </div>
        </div>
    </form>
    <br>
    <?php 
        // функция - допределяет последний id в таблице рецептов   
        $id = get_last_id($db);
        // преобразует id в целое число
        $recipe_id =intval($id['id']);
    ?>
    <form action="index.php?id=<?php echo $recipe_id; ?>" method="post">
        <label>Больше не нужно добавлять Ингредиенты?</label><br>
        <input type="submit" class="btn btn-warning" value="Рецепт закончен" />
    </form>
</div>

<?php
require 'inc/footer.php';    
?>