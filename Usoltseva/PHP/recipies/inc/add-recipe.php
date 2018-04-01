<!--  форма добавления рецепта-->

<div class=" jumbotron well">
    <h1>Добавить рецепт</h1>
    <form action="" method="post" class="form-horizontal">
        <div class="form-group">
            <label class="control-label col-sm-2" for="title">Название рецепта *обязательно</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="title" id="title" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="description">Описание рецепта *обязательно</label>
            
            <div class="col-sm-6">
                <textarea rows="10" type="text" class="form-control" name="description" id="description"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="cook_time">Время приготовления </label>
            <div class="col-sm-2">
                <input type="text" class="form-control" name="cook_time" id="cook_time" />
            </div>
        </div>
        <br>
        <div class="form-group">
            <label class="control-label col-sm-2" for="img_src">Название картинки <br>(включая расширение .jpg, .png и т.д.)</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="img_src" id="img_src" aria-describedby="helpImage" />
                <span id="helpImage" class="help-block">Добавить картинку</span>
            </div>
        </div>
        <br>
       
        <input type="hidden" name="recipe" value="addRecipe"/>
        <div class="form-group">        
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-success" value="Продолжить" />
            </div>
        </div>
    </form>
</div>
<?php
require 'inc/footer.php';    
?>