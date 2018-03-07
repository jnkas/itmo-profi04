<?php

class Model_Authorization extends Model
{
    public function checkUserProf() {
        $tempReturn = false;
        if (isset($_POST[loginName]) && isset($_POST[passName])) {
            $handlerDB = new DBSQLHandler();
            $arrUserInf = $handlerDB->getUserInfInArr();
            foreach ($arrUserInf as $value) {
                if ($_POST[loginName] === $value->login && $_POST[passName] === $value->password) {
                    $_SESSION["auth"] = true;
                    $_POST[loginName] = "";
                    $_POST[passName] = "";
                    $tempReturn = true;
                    break;
                }
            }
        }
        return $tempReturn;
    }

    public function addUser() {
        include "core/config.php";
        $checkTempReturn = false;
        if (isset($_POST[loginRegName]) && isset($_POST[passwordRegName])) {
            $pdo = new PDO(DSN, DB_USERNAME, DB_PASSWORD);
            $sqlQuery = "INSERT INTO users_profile SET ".
                "login='".$_POST[loginRegName]."', ".
                "password='".$_POST[passwordRegName]."', ".
                "full_name='".$_POST[fullNameReg]."', ".
                "email='".$_POST[emailRegName]."', ".
                "phone='".$_POST[phoneRegName]."'";
            $pdo->query($sqlQuery);
            $checkTempReturn = true;
        }
        return $checkTempReturn;
    }

    public function logoutUser() {
        session_unset();
    }
}