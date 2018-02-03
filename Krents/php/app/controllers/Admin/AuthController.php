<?php
/**
 * Created by PhpStorm.
 * User: darlane
 * Date: 12/19/17
 * Time: 7:57 PM
 */

namespace Controllers\Admin;


use Lumisade\Models\Input;

class AuthController
{

    public function auth(Input $input)
    {
        if (app()->request->session->get('auth')) {
            return app()->redirect('/admin');
        }
        if (app()->request->isMethod('post')) {
            if (app()->auth->attempt($input->get('login'), $input->get('password'))) {
                app()->request->session->remove('error_auth');
                return app()->redirect('/admin/calendar');
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
        app()->auth->logout();
        return app()->redirect('/admin/auth');
    }

}