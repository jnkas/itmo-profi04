<?php
/**
 * Created by PhpStorm.
 * User: darlane
 * Date: 12/19/17
 * Time: 7:57 PM
 */

namespace Controllers\Admin;


use Framework\Input;

class AuthController
{

    public function auth(Input $input)
    {
        if (app()->request->session->get('auth')) {
            return app()->redirect('/admin');
        }
        if (app()->request->isMethod('post')) {
            $accounts = json_decode(file_get_contents(APP_PATH.'/public/files/passwd'));
            foreach ($accounts as $account) {
                if ($account->login === $input->get('login') && $account->pass === md5($input->get('password'))) {
                    app()->request->session->set('auth', true);
                    return app()->redirect('/admin/calendar');
                }
            }
            app()->request->session->set('error_auth', true);
            return app()->redirect('/admin/calendar');
        }
        return view('/admin/auth', [
            'errorAuth' => app()->request->session->get('error_auth')
        ]);
    }


    public function logout()
    {
        app()->request->session->remove('auth');
        return app()->redirect('/admin/auth');
    }

}