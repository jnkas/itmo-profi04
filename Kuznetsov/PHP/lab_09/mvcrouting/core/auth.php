<?php

class UserModel {
    public function getUser($login, $password) {
        //запрос к данным для нахождения пользователя в системе
        //возвращает массив с набором свойств
        //return ['login'=>'Vasya', 'phone'=>'89111232343', 'email'=>'example@mail.ru', 'role'=>'admin'];
        
        /*$lines = file('./logipass/logipass.txt');
        foreach($lines as $line) {
            $arr = explode('~', $line);
            if($arr[0] === $login && $arr[1] === $password) {
                return ['name'=>'Sergei', 'phone'=>'89000000001', 'email'=>'example@mail.ru', 'role'=>'admin'];
            } else {
                return;
            }
        }*/
        
        $query = 'SELECT * FROM authorization WHERE login=:login AND password=:password';
        $result = DatabaseHandler::GetRow($query, ['login'=>$login, 'password'=>$password]);
        if($result !== false) {
            return $result;
        } else {
            return;
        }
    }
}

class UserProfile {
    private $login;
    private $password;
    private $name;
    private $phone;
    private $email;
    private $role;
    
    public function __construct($user) {
        foreach($user as $key=>$value) {
            $this->$key = $value;
        }
    }
}

class Auth {
    private $login;
    private $password;
    private $user;     
    
    public function __construct() {
    }
    
    public function init($login, $password) {
        $this->login = $login;
        $this->password = $this->hashPsw($password);
    }
    
    public function hashPsw ($password) {
        return md5($password);
    }
    
    public function verification() {
        $mdl = new UserModel();
        $result = $mdl->getUser($this->login, $this->password);
        if(count($result) !== 0) {
            $this->user = new UserProfile($result);
            $_SESSION['auth'] = true;
            $_SESSION['profile'] = $this->user;
            $_SESSION['login'] = $result['login'];
            return true;
        } else {
            return false;
        }
    }
    
    public function logout() {
        unset($_SESSION['auth']);
        unset($_SESSION['profile']);
        unset($_SESSION['login']);
    }
    
    public function isAuth() {
        return (isset($_SESSION['auth']));
    }
    
    public function getProfile() {
        //не работает
        return (isset($_SESSION['profile']))? $_SESSION['profile'] : null;
    }
}

//$login = $app->request->input->get('login');
//$psw = $app->request->input->get('password');

/*$auth = new Auth($login, $psw);
$auth->verification();*/







