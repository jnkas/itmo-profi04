<?php
/**
 * Created by PhpStorm.
 * User: darlane
 * Date: 1/23/18
 * Time: 8:38 PM
 */

namespace Lumisade\Models;


class Auth
{
    private $user;


    /**
     * @param $login
     * @param $password
     * @return bool
     */
    public function attempt($login, $password)
    {
        if ($userData = (new User())->getUser($login, $password)) {
            $this->user = new UserProfile($userData);
            app()->request->session->set('auth', true);
            app()->request->session->set('user', $this->user);
            return true;
        }

        return false;
    }


    public function logout()
    {
        app()->request->session->remove('auth');
        app()->request->session->remove('user');
    }

    /**
     * @return bool
     */
    public function isAuth()
    {
        return app()->request->session->get('auth') !== true;
    }

    /**
     * @return null|UserProfile
     */
    public function user()
    {
        return app()->request->session->get('user');
    }
}