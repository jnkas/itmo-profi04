
<?php
include "../configuration.php";
$curDir = "";
$textPage = $_POST[textAreaPage];
$contentDefault = file_get_contents("../default.php");
$contentMenuDefault = "../menuDefault.php";
$formatString = sprintf($contentDefault, $textPage);
foreach ($arrCategory as $key => $value)
{
    if ($_POST[folderCategory] == $value)
    {
        $curDir = $key;
        break;
    }
}



$curFile = fopen("../".$curDir."/".$_POST[namePage].".php", "w+");
fwrite($curFile, $formatString);
fclose($curFile);
header("Location: index.php");