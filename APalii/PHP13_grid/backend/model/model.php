<?php
# Задание 1 
class Model {

    public function getClients() {
        
        $query = "select auth_id, login, pass from auth"; 
        $result =  DatabaseHandler::GetAll($query); 
        return json_encode($result);        
    }    

    public function insertItem() {
        
        $name = $_POST['login']; 
        $pass = $_POST['pass']; 
        // экранирование одинарной ковычки 
        
        $query = "insert into auth (login, pass) values (:name, :pass)"; 
        $result =  DatabaseHandler::execute($query, ['name'=>$name , 'pass'=>$pass ]); 

        $query = "select auth_id from auth WHERE login = :name and pass = :pass "; 
        $result =  DatabaseHandler::GetAll($query, ['name'=>$name , 'pass'=>$pass ]); 
        return $result[0]["auth_id"];                
    }  

    public function updateItem() {
        
        $name = $_POST['login']; 
        $pass = $_POST['pass'];
        $id = $_POST['auth_id']; 
        // экранирование одинарной ковычки 
        
        $query = "update auth SET login = :name, pass = :pass WHERE auth_id = :id"; 

        $result =  DatabaseHandler::execute($query, ['name'=>$name , 'pass'=>$pass, 'id' => $id ]); 
                
    }  

    public function deleteItem() {
        
        $id = $_POST['auth_id']; 
        // экранирование одинарной ковычки 
        
        $query = "delete from auth WHERE auth_id = :id"; 

        $result =  DatabaseHandler::execute($query, ['id' => $id ]);        
    }  
}