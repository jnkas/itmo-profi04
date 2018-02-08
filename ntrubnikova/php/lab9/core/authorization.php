<?php

class Authorization {

    private $login;
    private $password;
    private $user;    
    
    public function __construct($login = NULL, $password = NULL) {
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
            $this->user = new UserProfile($result[0]);
            $_SESSION['auth'] = true;
            $_SESSION['profile'] = $this->user;
            return 'verified';
        } else {
            return 'Неверное имя пользователя или пароль';
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



//$login = App::Request->input->get('login');
//$psw = App::Request->input->get('password');
//
//
//$auth = new Authorization($login, $psw);
//$auth->verification();
