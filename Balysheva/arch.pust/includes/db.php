<?php


$connection = mysqli_connect(
    $config['db']['server'],
    $config['db']['username'],
    $config['db']['password'],
    $config['db']['name']
);

if($connection == false){
    echo 'Не удалость подключиться к базе данных!<br>';
    echo mysqli_connect_error();
    exit();
}

?>