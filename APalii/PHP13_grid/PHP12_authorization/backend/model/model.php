<?php
# Задание 1 
class Model {

    public function addUser() {
    	//App::$DB::execute('select * from t where id = :id',['id'=>100 ] ); 
        //App::input->get('login');
        $name = $_POST['name']; 
        $pass = $_POST['pass']; 
        // экранирование одинарной ковычки 
        
        $query = "insert into auth (login, pass) values (:name, :pass)"; 

    	$result =  DatabaseHandler::execute($query, ['name'=>$name , 'pass'=>$pass ]); 

        if ($result == 23000) $data = "Duplicate for key 'login'";
        elseif ($result == 0) $data = "Ok";
        else $data = "Что-то пошло не так.";

    	//$result =  DatabaseHandler::GetAll('select name, pass from auth where id_auth = :id', ['id'=>1 ] ); 
        return $data;
        
    }

    public function validateUser() {
        //App::$DB::execute('select * from t where id = :id',['id'=>100 ] ); 
        //App::input->get('login');
        $name = $_POST['name']; 
        $pass = $_POST['pass']; 
        // экранирование одинарной ковычки 
        
        $query = "select count(login) as AmountOfStr from auth where login=:name and pass=:pass"; 

        $result =  DatabaseHandler::GetAll($query, ['name'=>$name , 'pass'=>$pass ]); 
        //var_dump($result[0]['AmountOfStr']);
        
        if ($result[0]['AmountOfStr'] == 0) $data = "Incorrect Login or Password";
        elseif ($result[0]['AmountOfStr'] == 1) $data = "Correct pair of login and password";
        else $data = "Что-то пошло не так.";

        return $data;
    }
}