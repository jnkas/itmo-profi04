<?php
var_dump($_POST);
/*
$open = fopen("tmpl/2.txt","r");
$dt = date("d.m.Y" ,strtotime($_POST['date']));
$result = true;
while (($line = fgetcsv($open,0,";"))!== FALSE){
	if ($dt == $line[0]){
		$result = false;
		break;
	} 
}
fclose($open);
*/


function rus2translit($string) {
    $converter = array(
        'а' => 'a',   'б' => 'b',   'в' => 'v',
        'г' => 'g',   'д' => 'd',   'е' => 'e',
        'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
        'и' => 'i',   'й' => 'y',   'к' => 'k',
        'л' => 'l',   'м' => 'm',   'н' => 'n',
        'о' => 'o',   'п' => 'p',   'р' => 'r',
        'с' => 's',   'т' => 't',   'у' => 'u',
        'ф' => 'f',   'х' => 'h',   'ц' => 'c',
        'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
        'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
        'э' => 'e',   'ю' => 'yu',  'я' => 'ya',
        
        'А' => 'A',   'Б' => 'B',   'В' => 'V',
        'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
        'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
        'И' => 'I',   'Й' => 'Y',   'К' => 'K',
        'Л' => 'L',   'М' => 'M',   'Н' => 'N',
        'О' => 'O',   'П' => 'P',   'Р' => 'R',
        'С' => 'S',   'Т' => 'T',   'У' => 'U',
        'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
        'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
        'Ь' => '\'',  'Ы' => 'Y',   'Ъ' => '\'',
        'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
    );
    return strtr($string, $converter);
}
function str2url($str) {
    // переводим в транслит
    $str = rus2translit($str);
    // в нижний регистр
    $str = strtolower($str);
    // заменям все ненужное нам на "-"
    $str = preg_replace('~[^-a-z0-9_]+~u', '-', $str);
    // удаляем начальные и конечные '-'
    $str = trim($str, "-");
    return $str;
}

echo rus2translit("рыбалка88 99");


$content = "content/";
$category = str_replace("\n", " ", $_POST['category']);

	//echo $category;

$page_id = str_replace("\n", " ", $_POST['page_id']);
	//echo $page_id;

$description = str_replace("\n", " ", $_POST['description']);
	echo $description;		

function getConfig(){
	$dataJson = file_get_contents('config.TXT', FILE_USE_INCLUDE_PATH);
	$dataArray = json_decode($dataJson, true);

	return $dataArray;
}
function addCatToConf($cat) {

	$conf = getConfig();
	$conf['struct'][$cat] = []; 
	$dataJ = json_encode($conf, JSON_PRETTY_PRINT);
	file_put_contents('config.TXT', $dataJ);

}
function addPageToConf($cat, $page) {
	
	$conf = getConfig();
	array_push($conf['struct'][$cat], $page);
	$dataJ = json_encode($conf, JSON_PRETTY_PRINT);
	file_put_contents('config.TXT', $dataJ);

}


$en_category = rus2translit($category);
$en_page_id = rus2translit($page_id);

//check does directory exist if not create dir
if (!file_exists($content.$en_category))
{
	mkdir ($content.$en_category);

addCatToConf($category);

}

$page_idd = fopen ($content.$en_category."/".$en_page_id.".txt","a");

echo "<br>";
echo $page_idd;

echo "<br>";
echo fwrite ($page_idd, $description);
fclose($page_idd);

addPageToConf($category, $page_id);



// if ($result){
// 	/*
// 	$file = fopen("tmpl/2.txt","a");
// 	$description = str_replace("\n", " ", $_POST['description']);
// 	$str = PHP_EOL.'"'. $dt . '";"' . $_POST['title'] . '";"' . $description.'"';
// 	fwrite($file, $str);
// 	fclose($file);
// 	*/
	//$category = str_replace("\n", " ", $_POST['category']);
	//echo $category;
	// $data = array("date" => $dt,
	// 			"title" => $_POST['title'],
	// 			'descr' =>  $description);	
	
	// array_push($inputDataArray, $data);
	// $dataJSON = json_encode($inputDataArray, JSON_PRETTY_PRINT);
	// file_put_contents("tmpl/4.txt", $dataJSON); 



// 	echo 'Record has been created';
// }
// else {
// 	echo 'File already have a record on this date';

//}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Server site gen Lab6</title>
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

</head>
<body>
	<div class="container">
		<form action="hendler_form.php" method="POST">

			<button type="submit" formaction="http://localhost/php_lab_6/admin_site_gen_mustache.php" class="btn btn-primary">Return to the Admin page</button>
	  </form>
	</div>
	
</body>
</html>

