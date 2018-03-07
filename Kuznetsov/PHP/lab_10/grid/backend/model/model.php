<?php

class Model {
    
    public function getUsers($page) {
        $num = ($page>0)? ($page - 1)*10 : $page*10;
        $query = "SELECT * FROM users LIMIT " . +$num . ", 10";
        $query2 = "SELECT COUNT(id_users) AS count FROM users";
        
        $result = DatabaseHandler::GetAll($query);
        $count = DatabaseHandler::GetRow($query2);
        if($result !== false) {
            $result[] = $count;
            return $result;
        } else {
            return 'nothing';
        }
    }
    
    public function addUsers($n, $l, $a, $e) {
        $query = "INSERT INTO users VALUES (null, :name, :login, :age, :email)";
        $result = DatabaseHandler::Execute($query, ['name'=>$n, 'login'=>$l, 'age'=>$a, 'email'=>$e]);
    }
    
    public function deleteUsers($id) {
        $query = "DELETE FROM users WHERE id_users=:id";
        $result = DatabaseHandler::Execute($query, ['id'=>$id]);
        return;
    }
    
    public function updateUser($id, $n, $l, $a, $e) {
        $query1 = "UPDATE users SET name=:name, login=:login, age=:age, email=:email WHERE id_users=:id";
        $result1 = DatabaseHandler::Execute($query1, ['id'=>$id, 'name'=>$n, 'login'=>$l, 'age'=>$a, 'email'=>$e]);
        return;
    }
}




























