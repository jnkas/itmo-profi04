<?php 

include "core/autoloader.php";

$request = new Request();
$id = $request->post->readPost('id');
var_dump($id);

$mdl = new Model();
$mdl->deleteRecord($id);

