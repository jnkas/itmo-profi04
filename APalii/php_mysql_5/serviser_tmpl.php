<?php

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
	$time_stamp_start_date = date_timestamp_get(DateTime::createFromFormat("Y-m-d",$_POST['date_start']));
	$time_stamp_end_date = date_timestamp_get(DateTime::createFromFormat("Y-m-d",$_POST['date_end']));
	
	foreach ($array as $el){
		$el['img'] = ("img/" . $el["date"] . ".jpg");	
		$el['date_ms'] = date_timestamp_get(DateTime::createFromFormat("d.m.Y",$el["date"]));
		if ($el['date_ms'] >= $time_stamp_start_date && $el['date_ms'] <= $time_stamp_end_date){
			array_push($array2, $el);
		}
	}

	for ($i = 0, $len = count($array2); $i<$len-1; $i++) { 		
		for ( $j = 0; $j<$len-1-$i; $j++) {
			if($array2[$j+1] < $array2[$j]) {
				$tmp = $array2[$j];
				$array2[$j] = $array2[$j+1];
				$array2[$j+1] = $tmp;
			}
		}		
	}
	//return array_msort($array2, array('date_ms'=>SORT_ASC));
	return $array2;
}

	$allDays = readJSONFile();  // Read JSON file and put in to string and Convert the request into an object, using the PHP 
	$result_array = sortDates($allDays);  //Sselect events in  requested range of dates and sort by entered dates. 
	echo json_encode(array("list" => $result_array), JSON_PRETTY_PRINT); 

?>








