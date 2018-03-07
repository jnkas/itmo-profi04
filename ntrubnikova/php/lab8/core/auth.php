<?php

session_start();

class UserModel {
    public function getUser($login, $password) {
        //запрос к данным для нахождения пользователя в системе
        //возвращает массив с набором свойств
        return ['login'=>'Vasya', 'phone'=>'89111232343', 'email'=>'example@mail.ru', 'role'=>'admin'];
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
    
    public function __construct($login, $password) {
        $this->login = $login;
        $this->password = hashPsw($password);
        
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
        } else {
            echo 'ошибка';
        }
    }
    
    public function logout() {
        unset($_SESSION['auth']);
        unset($_SESSION['profile']);
    }
    
    public function isAuth() {
        return (isset($_SESSION['auth']));
    }
    
    public function getProfile() {
        return (isset($_SESSION['profile']))?$_SESSION['profile'] : null;
    }
}

class Request {
    
}
$login = App::Request->input->get('login');
$psw = App::Request->input->get('password');


$auth = new Auth($login, $psw);
$auth->verification();
