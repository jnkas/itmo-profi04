<?php
/**
 * Created by PhpStorm.
 * User: diakov312
 * Date: 17.02.2018
 * Time: 14:51
 */

class Model_Admin extends Model
{
    public function loadData() {
        include "core/config.php";
        $handlerDB = new DBSQLHandler();
        return $handlerDB->getUserInfInArr();
    }

    public function insertItem() {
        include "core/config.php";
        $handlerDB = new DBSQLHandler();
        return $handlerDB->insertItem();
    }

    public function updateItem() {
        include "core/config.php";
        $handlerDB = new DBSQLHandler();
        return $handlerDB->updateItem();
    }

    public function deleteItem() {
        include "core/config.php";
        $handlerDB = new DBSQLHandler();
        return $handlerDB->deleteItem();
    }
}