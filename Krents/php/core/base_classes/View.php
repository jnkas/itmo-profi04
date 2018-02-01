<?php
/**
 * Created by PhpStorm.
 * User: darlane
 * Date: 1/19/18
 * Time: 5:13 PM
 */

namespace Lumisade\Models;


class View
{

    /**
     * @param $tplName
     * @param array $attributes
     */
    public function render($tplName, $attributes = [])
    {
        extract($attributes, EXTR_OVERWRITE);
        ob_start();
        try {
            include_once APP_PATH.'/views/'.$tplName.'.php';
        } catch (\ErrorException $e) {
            echo $e->getMessage();
        }
        $content = ob_get_contents();
        ob_clean();
        echo $content;
        return;
    }
}