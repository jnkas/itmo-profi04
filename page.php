<?php
function generatorHTML(){
$header =''///вся верстка заголовка html
$content ="";
    //получить данные из файла в диапазоне $_POST ['dt_start'] $_POST['dt_end']
$mass = [['h'=>'заголовок 1', 'desc' => 'Описание1'], [h'=>'заголовок 2', 'desc' => 'Описание2']];
$body="<body><div id=content>";
$container ="";
foreach ($mass as $key=>$value){
$content.='<div class="row"><h1>'.$value['h'].'</h1><pre>'.$value['desc'];
}
$container =$body.$content."</div></body>";
return $html;
}