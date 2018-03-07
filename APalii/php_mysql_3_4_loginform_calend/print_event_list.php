<!DOCTYPE html>
	<html xmlns="http://www.w3.org/1999/xhtml" lang="ru">
	<head>

	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	  <title>PHP:range_of_evens</title>
	</head>
<div class="container">
<!-- transfer data by POST to php part inside this file -->
		<form  method="POST" > 
			<h2>Here you could see list of evnts for period of time.</h2>
			<h5>Please enter from ...  to ... dates .</h5>
			<div class="form-group form-control-lg" style="display: inline-block;">
				
				<label>Data Start</label>
				<input class="form-control" type="date" name="date_start" value= "<?php echo $_POST['date_start'];?>" >
			</div>
			<div class="form-group form-control-lg" style="display: inline-block;">
				<label>Data End</label>
				<input class="form-control" type="date" name="date_end" value= "<?php echo $_POST['date_end'];?>">
			</div>			
	    
			<div class="form-group form-control-lg" style="display: inline-block;"><button type="submit" class="btn btn-primary"> Submit</button></div>
			<hr>
	  </form>

	</div>
	<div class = "output">

<?php 

function genFeed( $mass) {
	$content="";
	foreach ($mass as $el) {

	     $content .= '<div style="border: 1px solid red; width: 80% ;margin: auto;" class="form-group form-control-lg;"> <div style="display: inline-block; width: 19%;">    <img style= "width: 140px;     margin-top: -40px; margin-left: 7%;" src="' . $el['img'] . '"></div> <div style= "text-align: center; display: inline-block; width: 80%;"> <pre style= "font-size:20px";>' . $el['date'].  ' </pre> <h4>' . $el['title']  . '</h4><hr><br> <p style="width: 100%; margin: auto; margin-top: -32px;">' . $el['descr'].  ' </div></p><hr></div>';
	}
	return $content;
}

// Read JSON file and put in to string and Convert the request into an object, using the PHP function json_decode().
function readJSONFile(){
	$filepath = "tmpl/3.txt";
	$inputDataJSON = file_get_contents($filepath);
	return json_decode($inputDataJSON, true);
} 

function array_msort($array, $cols)//Sort array (events) by key date
{
    $colarr = array();
    foreach ($cols as $col => $order) {
        $colarr[$col] = array();
        foreach ($array as $k => $row) { $colarr[$col]['_'.$k] = strtolower($row[$col]); }
    }
    $eval = 'array_multisort(';
    
	foreach ($cols as $col => $order) {
        $eval .= '$colarr[\''.$col.'\'],'.$order.',';
    }
    $eval = substr($eval,0,-1).');';
    eval($eval);
    $ret = array();
	
	
    foreach ($colarr as $col => $arr) {
        foreach ($arr as $k => $v) {
            $k = substr($k,1);
            if (!isset($ret[$k])) $ret[$k] = $array[$k];
            $ret[$k][$col] = $array[$k][$col];
        }
    }
    return $ret;

}
//select requested range of events and sort list of events on ascending order by date 
function sortDates($array){
	$array2 = array();
	$time_stamp_start_date = date_timestamp_get(DateTime::createFromFormat("Y-m-d",$_POST['date_start'])).'<br>';
	$time_stamp_end_date = date_timestamp_get(DateTime::createFromFormat("Y-m-d",$_POST['date_end'])).'<br>';
	
	foreach ($array as $el){
		$el['img'] = ("img/" . $el["date"] . ".jpg");	
		$el['date_ms'] = date_timestamp_get(DateTime::createFromFormat("d.m.Y",$el["date"]));
		if ($el['date_ms'] >= $time_stamp_start_date && $el['date_ms'] <= $time_stamp_end_date){
			array_push($array2, $el);
		}
	}
	return array_msort($array2, array('date_ms'=>SORT_ASC));	
}

function generateHTML() {

	/*
	$header= '
	<!DOCTYPE html>
	<html xmlns="http://www.w3.org/1999/xhtml" lang="ru">
	<head>

	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

	  <title>PHP: array_pop - Manual </title>
	</head>
	';
	*/
	// TO-Do Получить данные из файла в диапазоне $_POST['dt_start'] $_POST['dt_end']
	

	$allDays = readJSONFile();  // Read JSON file and put in to string and Convert the request into an object, using the PHP function json_decode().
	$result_array = sortDates($allDays);  //Sselect events in  requested range of dates and sort by entered dates. 

	//$body = "<body>  <div id=content>";
	

	$content = genFeed($result_array); // Construct string in to HTML form to place in to WI
	
	//$conteiner = $body.$content."</div></body>";


	//$html = $header. $conteiner. '</html>';
	return $content;
}

//echo genFeed(sortDates(readJSONFile()));
if ($_POST){
	echo generateHTML();	// generate result list of events 
}
	

?>

</div>







