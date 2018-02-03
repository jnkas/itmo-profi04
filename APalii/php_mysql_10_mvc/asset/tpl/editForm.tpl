<?php 
$result = "<script type='text/javascript' src='asset/js/action.js'></script> <select id='file_id'>";
			
foreach($data as $el){
	$result .= "<option value=".$el->id.">".$el->name."</option>";
}
$result .= "</select><br><button id='actionBTN' value='editgetActionHelper' class='btn btn-primary'>Show Page </button>";
echo $result;


?>