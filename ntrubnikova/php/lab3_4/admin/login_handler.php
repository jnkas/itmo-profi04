<?php 
header('Content-Type: text/html; charset=utf-8');

$login = $_POST['login'];
$password = md5(md5($_POST['password']. 'secret'));

//Записываем логин и пароль в файл
//$toWrite = $login. ";". $password;
$file = "passwords.txt";
//file_put_contents($file, $toWrite);

$info = file_get_contents($file,FILE_USE_INCLUDE_PATH);

//Удаляем UTF8 BOM
function remove_utf8_bom($text)
{
    $bom = pack('H*','EFBBBF');
    $text = preg_replace("/^$bom/", '', $text);
    return $text;
}

$info = remove_utf8_bom($info);
$creds =  explode(";",$info);
$keys = array('login','password');
$combined = array_combine($keys,$creds);

//Сравниваем данные из формы и файла
if ($login === $combined['login'] && $password === $combined['password']) {
    session_set_cookie_params(86400);
    session_start();
    $_SESSION['authorized'] = "yes";
}

//Редирект на страницу
$location = "http://".$_SERVER['HTTP_HOST']. "/admin/index.php";
header("HTTP/1.1 303 See Other");
header("Location:". $location);
?>

