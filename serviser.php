<?php
$dt = $_GET['dt'];
$namefile=$dt.txt;//Переменная, передающая текстовый файл//
$picture=$dt.jpeg; //Переменная, передающая картинку к файлу//
$arrayDayCalender=('dt','namefile','picture');//массив:дата, описание файла, картинка//
$fileDate=file_get_contents('./dt.txt,FILE_USE_INCLUDE_PA
TH);
$filePicture=file_get_contents('./dt.jpeg,FILE_USE_INCLUDE_PA
TH);//выводим содержание файлов//
echo json_encode(arrayDayCalender);//выводим массив//

?>