<?php

class UserProfile {
    public $login;
    public $password;
//    private $name;
//    private $phone;
//    private $email;
//    private $role;
    
    public function __construct($user) {
        foreach($user as $key=>$value) {
            $this->$key = $value;
        }
    }
    
}