<?php
/**
 * Created by PhpStorm.
 * User: darlane
 * Date: 12/23/17
 * Time: 1:07 PM
 */

namespace App\Models;


class Event
{
    public static function all()
    {
        $dir       = APP_PATH.'/public/files/events/';
        $dateFiles = glob($dir.'*');
        $dates     = [];
        foreach ($dateFiles as $dateFile) {
            $dates[] = str_replace($dir, '', $dateFile);
        }
        return $dates;
    }

    public static function getData($date)
    {
        return file_get_contents(APP_PATH.'/public/files/events/'.date('d.m.Y', strtotime($date)));

    }
}