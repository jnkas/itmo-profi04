<?php

class Model{
    
    public function getData(Array $post, $table, $order){
        extract($post);
        return DatabaseHandler::GetAll("select * from ". $table ." order by ". $order. " limit ". $startRec. ", ". $numRecs);
    }
    
    public function getRecCount($table){
        $query = "select count(*) from ". $table;
        $result =  DatabaseHandler::GetOne($query);
        echo $result;
    }
    
    public function getLastRec($table, $idField){
        $query = "select max(". $idField .") from ". $table;
        $result =  DatabaseHandler::GetOne($query);
        echo $result;
    }
    
    public function insertRecord(Array $row, $table){
        extract($row);
        $tableFields = '';
        foreach($row as $key=>$value) {
            $tableFields .= ':'. $key. ',';
        }
        
        $tableFields = rtrim($tableFields,',');
        $query = "insert into ". $table. " values ('',". $tableFields .")";
        $result =  DatabaseHandler::execute($query, $row);
        return $result;
    }
    
    public function updateRecord(Array $post, $table, $idField){
        extract($post);
        $tableFields = ' ';
        foreach($post as $key=>$value) {
            $tableFields .=  $key. " = ". "'". $value. "', ";
        }
        
        $tableFields = rtrim($tableFields,', ');
        $query = "update ". $table ." set". $tableFields ." where ".$idField."=". $id;
        var_dump($query);
        $result =  DatabaseHandler::execute($query, $row);
        return $result;
    }
    
    public function deleteRecord($idField, $idValue, $table){
        $query = "delete from ". $table." where ". $idField. " = :idValue";
        $result =  DatabaseHandler::execute($query, ['idValue' => $idValue]);
//        return $result;
    }
        
}