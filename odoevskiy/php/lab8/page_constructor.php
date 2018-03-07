<?php 
	function get_arr() {
		$arr_page = file('tpl/page.txt');
		foreach($arr_page as $key => $value) {
			$arr_exp = explode(';', $value);
			echo '<div id="post"><p>'.($key+1).'</p><h2>'.$arr_exp[0].'</h2><div id="text">'.$arr_exp[1].'</div></div>'; 
		}
	}
	get_arr();
?>