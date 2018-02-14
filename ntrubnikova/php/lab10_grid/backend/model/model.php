<?php

class Model{
    
    public function getData(){
        return DatabaseHandler::GetAll('select * from users');
    }
    
    public function insertRecord(Array $row){
        extract($row);
        $tableFields = '';
        foreach($row as $key=>$value) {
            $tableFields .= ':'. $key. ',';
        }
        
        $tableFields = rtrim($tableFields,',');
        $query = "insert into users values ('',". $tableFields .")";
        $result =  DatabaseHandler::execute($query, $row);
        return $result;
    }
    
    public function updateRecord(Array $row){
        extract($row);
        $tableFields = ' ';
        foreach($row as $key=>$value) {
            $tableFields .=  $key. " = ". "'". $value. "', ";
        }
        
        $tableFields = rtrim($tableFields,', ');
        $query = "update users set". $tableFields ." where id=". $id;
        var_dump($query);
        $result =  DatabaseHandler::execute($query, $row);
        return $result;
    }
    
    public function deleteRecord($id){
        $query = "delete from users where id = :id";
        $result =  DatabaseHandler::execute($query, ['id'=>$id]);
//        return $result;
    }
        
}