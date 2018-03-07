<?php

class UserObj
{
    public $login;
    public $password;
    public $fullName;
    public $email;
    public $phone;
    public function __construct($login, $password, $fullName, $email, $phone)
    {
        $this->login = $login;
        $this->password = $password;
        $this->fullName = $fullName;
        $this->email = $email;
        $this->phone = $phone;
    }
}