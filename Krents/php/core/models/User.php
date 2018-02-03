<?php
/**
 * Created by PhpStorm.
 * User: darlane
 * Date: 1/30/18
 * Time: 4:07 PM
 */

namespace Lumisade\Models;

/**
 * Class User
 * @package Lumisade\Models
 * @property int id
 * @property string login
 * @property string password
 * @property bool is_active
 * @property string created_at
 * @property string updated_at
 */
class User extends Model
{
    protected $fields = [
        'id'        => 'int',
        'login'     => 'string',
        'password'  => 'string',
        'is_active' => 'bool',
    ];

    /**
     * @param $login
     * @param $password
     * @return null
     */
    public function getUser($login, $password)
    {
        return $this->where([
            'login'    => $login,
            'password' => $this->generateHash($password),

        ])->first();
    }

    /**
     * @param $password string
     * @return string
     */
    public function generateHash($password)
    {
        return crypt($password, '$2y$07$nXD2mYsHux2pH7wFJdlu7fVLv$');
    }
}