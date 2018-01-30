<?php
/**
 * Created by PhpStorm.
 * User: darlane
 * Date: 1/19/18
 * Time: 8:01 PM
 */

namespace Controllers\Admin;


class AdminBaseController
{

    public function handle()
    {
        if (app()->auth->isAuth()) {
            return app()->redirect('/admin/auth');
        }
    }

}