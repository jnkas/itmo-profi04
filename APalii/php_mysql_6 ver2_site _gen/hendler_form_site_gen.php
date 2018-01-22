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

include 'includes/rus2translit.php';


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

function addCatToConf($cat, $conf) {
	array_push($conf['arrCategory'], ["cat" => $cat]); 
	$conf['struct'][$cat] = []; 
	return $conf;
}

function addPageToConf($cat, $page, $conf) {
	array_push($conf['struct'][$cat], ["page" => $page]);
	return $conf;
}

function saveConfig($conf){
	$dataJ = json_encode($conf, JSON_PRETTY_PRINT);
	file_put_contents('config.TXT', $dataJ);
}

$en_category = rus2translit($category);
$en_page_id = rus2translit($page_id);

$configFile = getConfig();
//check does directory exist if not create dir
if (!file_exists($content.$en_category))
{
	mkdir ($content.$en_category);
	$configFile = addCatToConf($category, $configFile);
}
echo $content.$en_category."/".$en_page_id;

if (!file_exists($content.$en_category."/".$en_page_id.".txt"))
{
	$configFile = addPageToConf($category, $page_id, $configFile);
}
saveConfig($configFile);


$page_idd = fopen ($content.$en_category."/".$en_page_id.".txt","a");
fwrite ($page_idd, $description);
fclose($page_idd);

//echo "<br>";
//echo $page_idd;

//echo "<br>";






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

