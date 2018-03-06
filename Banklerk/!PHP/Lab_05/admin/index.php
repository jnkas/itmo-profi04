<?php
$listLogPass = file_get_contents("validation.txt",FILE_USE_INCLUDE_PATH);
$arrLogPass = explode("\r\n",$listLogPass);

function  transformationPassword($curPassword) {
    $curPassword = md5($curPassword."соль");
    return $curPassword;
}

$changedPass = transformationPassword($_POST[nPassword]);

session_start();
if (isset($_GET["logout"]) && $_GET["logout"] == true) {
    session_unset();
}
if ( isset($_SESSION["auth"]) && $_SESSION["auth"] === true) {
    include "admin.php";
} else {
    foreach ($arrLogPass as $value){
        $arrLogPassI = explode(";", $value);
        if ($_POST[nLogin] === $arrLogPassI[0] && $changedPass === $arrLogPassI[1]) {
            $_SESSION["auth"] = true;
            include "admin.php";
            $_POST[nLogin] = "";
            $_POST[nPassword] = "";
            break;
        }
    }
    if ($_SESSION["auth"] !== true) {
        include "validation.php";
    }
}
?>