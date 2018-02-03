	<?php
# Задание 1 
class Model {
    public function getPage($id) {
        return ['text' => 'Однажды в студеную зимнюю пору.'];
    }
    public function addPageHelper( $name, $desc) {
       	if(file_exists("./content/". $name.".txt")) return ['text' => 'Файл уже существует.'];
       	else {
    		$file_db = file_get_contents("./content/file_db.txt");
    		$arr_db = json_decode($file_db);
    		array_push($arr_db, ['name'=>$name,'id' => (end($arr_db)->id+1)]);	
			file_put_contents("./content/file_db.txt", json_encode($arr_db));

        	$file = fopen("./content/". end($arr_db)['id'].".txt", 'w');
    		fwrite($file, $desc);
    		fclose($file);
    		
        	return ['text' => 'Файл успешно создан'];
    	}
    }
    public function getFileList() {
		$file_db = file_get_contents("./content/file_db.txt");
    	return json_decode($file_db);
	}

	public function deletePageHelper($id) {
		if (unlink("./content/". $id.".txt")){
			$file_db = file_get_contents("./content/file_db.txt");
    		$arr_db = json_decode($file_db);
    		$new_arr_db = [];
    		for ($i = 0; $i<sizeof($arr_db); $i++) {
    			if ($arr_db[$i]->id != $id) {
    				$new_arr_db[sizeof($new_arr_db)] = $arr_db[$i];
    			}
    		}
        	file_put_contents("./content/file_db.txt", json_encode($new_arr_db));
        	return ['text' => 'Файл успешно удалён'];
		} 
		else return ['text' => 'Не удалось удалить файл'];
	}

	public function getPageHelper($id) {
		return ['text' => file_get_contents("./content/". $id.".txt")];
		
	}


	public function editPage($id, $desc) {
       	$file = fopen("./content/". $id.".txt", 'w');
   		fwrite($file, $desc);
   		fclose($file);
    	return ['text' => 'Файл успешно записан'];
    }
}