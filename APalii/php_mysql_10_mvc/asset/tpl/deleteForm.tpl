<?php 
$result = "<script type='text/javascript' src='asset/js/action.js'></script><select id='file_id'>";
			
foreach($data as $el){
	$result .= "<option value=".$el->id.">".$el->name."</option>";
}
$result .= "</select><br><button class='btn btn-primary' id='actionBTN' value='deleteActionHelper'>Delete Page on server</button>";
echo $result;
?>