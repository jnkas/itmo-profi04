<?php

include "core/config.php";
class DB_Objects
{
    public function getUserInfInArr() {
        $pdo = new PDO(DSN, DB_USERNAME, DB_PASSWORD);
        $data = $pdo->query("SELECT login FROM users_profile")->fetchAll(PDO::FETCH_OBJ);
        echo $data;
        foreach ($data as $value) {
            var_dump($value) ;
            /*foreach ($value as $item) {
                echo $item;
            }*/
        }
    }
}