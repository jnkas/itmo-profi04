<?php
/**
 * Created by PhpStorm.
 * User: darlane
 * Date: 1/30/18
 * Time: 5:27 PM
 */

namespace Lumisade\Models;


class UserProfile extends User
{
    public $login;
    public $name;
    public $phone;
    public $email;
    public $role;

    /**
     * UserProfile constructor.
     * @param $userData array
     */
    public function __construct($userData)
    {
        foreach ($userData as $key => $value) {
            $this->$key = $value;
        }

    }
}