<?php

include "core/config.php";

class DBSQLHandler
{
    public function getUserInfInArr() {
        $pdo = new PDO(DSN, DB_USERNAME, DB_PASSWORD);
        $data = $pdo
            ->query("SELECT id_users_profile AS id, login, password, full_name AS fullname, email, phone FROM users_profile")
            ->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }

    public function insertItem() {
        $pdo = new PDO(DSN, DB_USERNAME, DB_PASSWORD);
        $statementInsert = $pdo->prepare("INSERT INTO users_profile (login, password, full_name, email, phone) VALUES".
            " (:login, :password, :full_name, :email, :phone)");
        $statementInsert->bindParam(":login", $_POST[login]);
        $statementInsert->bindParam(":password", $_POST[password]);
        $statementInsert->bindParam(":full_name", $_POST[fullname]);
        $statementInsert->bindParam(":email", $_POST[email]);
        $statementInsert->bindParam(":phone", $_POST[phone]);
        $statementInsert->execute();

        $statementReturn = $pdo->prepare("SELECT id_users_profile AS id, login, password, full_name AS".
            " fullname, email, phone FROM users_profile WHERE id_users_profile = :id");
        $statementReturn->bindParam(":id", $pdo->lastInsertId());
        $statementReturn->execute();
        $result = $statementReturn->fetch(PDO::FETCH_OBJ);
        return $result;

    }

    public function updateItem() {
        $pdo = new PDO(DSN, DB_USERNAME, DB_PASSWORD);
        $statementUpdate = $pdo->prepare("UPDATE users_profile SET ".
            "login = :login, ".
            "password = :password, ".
            "full_name = :fullname, ".
            "email = :email, ".
            "phone = :phone ".
            "WHERE id_users_profile = :id");
        $statementUpdate->bindParam(":id", $_POST[id]);
        $statementUpdate->bindParam(":login", $_POST[login]);
        $statementUpdate->bindParam(":password", $_POST[password]);
        $statementUpdate->bindParam(":fullname", $_POST[fullname]);
        $statementUpdate->bindParam(":email", $_POST[email]);
        $statementUpdate->bindParam(":phone", $_POST[phone]);
        $statementUpdate->execute();
        return null;
    }

    public function deleteItem() {
        $pdo = new PDO(DSN, DB_USERNAME, DB_PASSWORD);
        $statementDelete = $pdo->prepare("DELETE FROM users_profile WHERE id_users_profile = :id");
        $statementDelete->bindParam(":id", $_POST[id]);
        $statementDelete->execute();
        return null;
    }
}