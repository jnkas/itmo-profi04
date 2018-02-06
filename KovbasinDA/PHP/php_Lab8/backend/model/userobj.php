<?php
/**
 * Created by PhpStorm.
 * User: diakov312
 * Date: 05.02.2018
 * Time: 23:56
 */

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