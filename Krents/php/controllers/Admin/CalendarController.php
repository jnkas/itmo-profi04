<?php
/**
 * Created by PhpStorm.
 * User: darlane
 * Date: 12/19/17
 * Time: 7:57 PM
 */

namespace Controllers\Admin;


use Framework\Input;

class CalendarController extends AdminBaseController
{
    public function index()
    {
        return view('/admin/calendar');
    }

    public function addEvent(Input $input)
    {
        $date  = date('d.m.Y', strtotime($input->get('date')));
        $image = $input->get('files')['image'];
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
            'header'  => $input->get('title'),
            'img_url' => $imgFileName,
            'desc'    => $input->get('desc')
        ];
        file_put_contents(APP_PATH.'/public/files/events/'.$date, json_encode($data));
        return app()->redirect('/admin/calendar');
    }
}