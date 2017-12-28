<?php
/**
 * Created by PhpStorm.
 * User: darlane
 * Date: 12/19/17
 * Time: 7:57 PM
 */

namespace Controllers;


class AdminCalendarController
{

    public function index($input)
    {
        if (isset($_SESSION['auth']) && $_SESSION['auth'] === true) {
            unset($_SESSION['error_auth']);
            return view('calendar/admin/index');
        }
        return view('calendar/admin/auth', [
            'errorAuth' => isset($_SESSION['error_auth']) && $_SESSION['error_auth'] ===  true
        ]);
    }

    public function auth($input)
    {
        $accounts = json_decode(file_get_contents(APP_PATH.'/public/files/passwd'));
        foreach ($accounts as $account) {
            if ($account->login === $input['login'] && $account->pass === md5($input['password'])) {
                $_SESSION['auth'] = true;
                return redirect('/calendar/admin');
            }
        }
        $_SESSION['error_auth'] = true;
        return redirect('/calendar/admin');
    }

    public function addEvent($input)
    {
        $date  = date('d.m.Y', strtotime($input['date']));
        $image = $input['files']['image'];
        $type  = null;
        if ($image['type'] === 'image/png') {
            $type = 'png';
        }
        if ($image['type'] === 'image/jpeg') {
            $type = 'jpg';
        }
        $imgFileName = '/public/img/'.$date.'.'.$type;
        move_uploaded_file($image['tmp_name'], APP_PATH.$imgFileName);
        $data = [
            'date'    => $date,
            'header'  => $input['title'],
            'img_url' => $imgFileName,
            'desc'    => $input['desc']
        ];
        file_put_contents(APP_PATH.'/public/files/events/'.$date, json_encode($data));
        return redirect('/calendar/admin');
    }
}