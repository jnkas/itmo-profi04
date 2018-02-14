<?php 

include "core/autoloader.php";

$request = new Request();
$post = $request->post->postArray;

$mdl = new Model();
$mdl->updateRecord($post);

