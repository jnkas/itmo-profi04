<?php
/**
 * Created by PhpStorm.
 * User: darlane
 * Date: 12/22/17
 * Time: 7:07 PM
 */

namespace Models;

/**
 * Class for first task, for syntax test
 * Class FirstTask
 */
class FirstTask
{
    public static function printValue($key, $value)
    {
        echo $key.':  '.$value.'<br>';
    }

    public static function debugValue($key, $value)
    {
        echo $key.':  ';
        var_dump($value);
        echo '<br>';
    }

}