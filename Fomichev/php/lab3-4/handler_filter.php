<?php
$arrFirstDate = explode("-", $_POST[idFirstDate]);
$arrSecondDate = explode("-", $_POST[idSecondDate]);
$contentDirTemplate = scandir('./template');
$resultString = "";

if ($_POST[idFirstDate] !== "" && $_POST[idSecondDate] !== "") {
    $minDate = mktime(0,0,0,$arrFirstDate[1],$arrFirstDate[2],$arrFirstDate[0]);
    $maxDate = mktime(0,0,0,$arrSecondDate[1],$arrSecondDate[2],$arrSecondDate[0]);

    if ($minDate <= $maxDate) {
        foreach ($contentDirTemplate as $value) {
            if ($value === "." || $value === "..") {
                continue;
            }

            $arrCurrFile = explode(".", $value);
            $currDate = mktime(0,0,0,$arrCurrFile[1],$arrCurrFile[0],$arrCurrFile[2]);
            if ($minDate <= $currDate && $currDate <= $maxDate) {
                $currFile = file_get_contents("./template/$value",FILE_USE_INCLUDE_PATH);
                $arr = explode(";", $currFile);
                $resultString = $resultString."<div id=\"day-calender\"><h1>$arr[0]</h1><h3>$arr[1]</h3><img src='./img/$arr[0].jpg'><p>$arr[2]</p></div>";
            }
        }
    } else {
        $resultString = "<p>Не верная дата/p>";
    }
} else {
    $resultString = "<p>Не верная дата</p>";
}

echo json_encode($resultString);
