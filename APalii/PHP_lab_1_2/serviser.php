<?php
$dt = $_POST['date'];

$open = fopen("tmpl/2.txt","r");
$data = array();
while (($line = fgetcsv($open,0,";"))!== FALSE){
	if ($dt == $line[0]){
		$data = array("title" => $line[1], 
						'descr' =>  $line[2], 
						'img' => ( $line[0] . ".jpg"));
		break;
	} 
    //$obj = new StdClass();
    //$obj->data = $line[0];
    //$obj->theme = $line[1];
    //array_push($data,$obj);
}

echo json_encode($data);
	//array('desc' => "Title",
      //                  "file_content" => $data, 
		//				'headers' => "  Description"));

?>