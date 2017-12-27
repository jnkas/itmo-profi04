<?php
$validationForm = '<html lang="en">
            <head>
                <meta charset="UTF-8">
                <title>php_Lab1</title>
                <link rel="stylesheet" href="../css/style.css">
            </head>
            <body>
                <div id="day-calender">
                    <form action="index.php" method="post">
                        <div><label for="inpLogin">Login:</label><input id="inpLogin" type="text" name="nLogin"></div>
                        <div><label for="inpPassword">Password:</label><input id="inpPassword" type="password" name="nPassword" ></div>
                        <div><button type="submit" style="width: 300px">Send</button></div>
                    </form>
                </div>
            </body>
            </html>';

$adminForm = '<html lang="en">
            <head>
                <meta charset="UTF-8">
                <title>php_Lab1</title>
                <link rel="stylesheet" href="../css/style.css">
            </head>
            <body>
                <div id="day-calender">
                    <form action="handler_form.php" method="post">
                        <div><label for="inpDateEvent">Дата события:</label><input id="inpDateEvent" type="date" name="dateEvent"></div>
                        <div><label for="inpHeadEvent">Заголовок события:</label><input id="inpHeadEvent" type="text" name="headEvent" ></div>
                
                        <div><label for="inpDescriptionEvent">Описание события:</label>
                        <textarea name="descriptionEvent" id="inpDescriptionEvent" cols="50" rows="10"></textarea></div>
                        <div><button type="submit" style="width: 300px">Send</button>
                        <button type="button" onclick=\'location.href="index.php?logout=true"\'>Logout</button></div>
                    </form>
                </div>      
            </body>
            </html>';

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
    echo $adminForm;
    //session_unset();
} else {
    foreach ($arrLogPass as $value){
        $arrLogPassI = explode(";", $value);
        if ($_POST[nLogin] === $arrLogPassI[0] && $changedPass === $arrLogPassI[1]) {
            $_SESSION["auth"] = true;
            echo $adminForm;
            $_POST[nLogin] = "";
            $_POST[nPassword] = "";
            break;
        }
    }
    if ($_SESSION["auth"] !== true) {
        echo $validationForm;
    }
}
?>