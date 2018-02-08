<?php

class UserModel {
    
    public function getUser($login, $password) {
        $user =  DatabaseHandler::GetAll('select login, password from auth where login = :name AND password = :password', ['name'=> $login, 'password'=>$password]);
        return $user;
    }
    
    public function saveUser($login, $password){
        $query = "insert into auth values ('', :login, :password)";
        $result =  DatabaseHandler::execute($query, ['login'=>$login , 'password'=>$password]);
//        return $result;
        return 'registered';
    }
    
}


