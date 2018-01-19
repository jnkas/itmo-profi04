<?php
/**
 * Created by PhpStorm.
 * User: darlane
 * Date: 1/19/18
 * Time: 5:13 PM
 */

namespace Framework;


class View
{

    /**
     * @param $tplName
     * @param array $attributes
     */
    public function render($tplName, $attributes = [])
    {
        extract($attributes, EXTR_OVERWRITE);
        include_once APP_PATH.'/views/'.$tplName.'.php';
        return;
    }
}