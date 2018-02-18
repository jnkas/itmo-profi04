<?php

define('TEMPLATE_PATH' , './assets/tpl/');

class View {
    private $template;	
    public  $content;
    
    public function __construct($tmpl = null) {
    	$this->template = $tmpl;
    }
    
    public function dataToTable(Array $data, $post) {
        extract($post);
        $num = $startRec + 1;
        
        //Create HTML from DB data
        $numRecs = count($data);
        $usersTable = '<tbody id="table" data-recs="'. $numRecs. '">';
        foreach ($data as $userData){
            $id = $userData['id'];
            $login = $userData['login'];
            $row = '<tr id="'. $id. '">'. "\r\n";

            foreach ($userData as $key => $value){
                if ($key == 'id') {
                    $row .= '<td class="align-middle" data-value="'. $num. '">'. $num. '</td>'. "\r\n";
                    $num = $num + 1;
                }
                else {
                    $row .= '<td class="align-middle" id="'. $key. '-'. $id. '" data-value="'. $value. '">'. $value. '</td>'. "\r\n";
                    }
            }

            //Add buttons to rows
            $row .= '<td><button type="button" class="btn btn-outline-warning" id="edit-'. $id. '" onclick="editRecord(this.id)"><img src="assets/img/edit.svg" width=20/></button></td><td><button type="button" id="delete-'. $id. '" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteModal" data-login="'. $login. '" data-id="'. $id .'"><img src="assets/img/trash.svg" width=20/></button><input type="hidden" name="id" value="'. $id. '" class="form-control" form="form-'. $id.'"><form method="post" action="save" id="form-'. $id. '"></form></td>'. "\r\n";

            $row.='</tr>' . "\r\n";
            $usersTable .= $row;
        }
        
        $usersTable .= '</tbody>';

        echo $usersTable;

    }
    
    public function renderPage() {
        ob_start();
        try {
            include(TEMPLATE_PATH.$this->template);
        } catch (Exception $e) {
        	// место где ошибка записывается в логер
        	echo "файл не найден";
        }
        $content = ob_get_contents();
        ob_end_clean();
        echo $content;
    }
    
}




