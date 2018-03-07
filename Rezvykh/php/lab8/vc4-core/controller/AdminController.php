<?php

class AdminController
{
    public function actionIndex() {
        echo 'AdminController actionIndex';
        return true;
    }

    public function actionUpanel() {
        echo 'Панель управленя пользователями';
        return true;
    }

}