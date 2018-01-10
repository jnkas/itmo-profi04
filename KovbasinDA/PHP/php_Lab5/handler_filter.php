<?php
$arrFirstDate = explode("-", $_POST[idFirstDate]);
$arrSecondDate = explode("-", $_POST[idSecondDate]);
$contentDirTemplate = scandir('./template');
$resultString = "";
$resultArr = [];
$iteration = 0;

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
                $resultArr[$iteration] = array("dateEvent" => $arr[0],"header" => $arr[1],"content" => $arr[2]);
                $iteration++;
            }
        }
    } else {
        $resultString = "<p>Дата начала периода не может быть больше даты конца периода!</p>";
    }
} else {
    $resultString = "<p>Не выбранна одна из дат!</p>";
}

$resultArr = array("listOfEvents" => $resultArr);

echo json_encode($resultArr);
