<?php
/**
 * Created by PhpStorm.
 * User: darlane
 * Date: 1/30/18
 * Time: 4:07 PM
 */

namespace Lumisade\Models;


class User
{

    /**
     * @param $login
     * @param $password
     * @return null
     */
    public function getUser($login, $password)
    {
        $accounts = json_decode(file_get_contents(APP_PATH.'/public/files/passwd'));
        foreach ($accounts as $account) {
            if ($account->login === $login && $this->checkPassword($password, $account->pass)) {
                unset($account->pass);
                return $account;
            }
        }
        return null;
    }

    /**
     * @param $password string
     * @return string
     */
    public function generatePassword($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    /**
     * CHeck password hash
     * @param $hash string
     * @return string
     */
    public function checkPassword($password, $hash)
    {
        return password_verify($password, $hash);
    }
}