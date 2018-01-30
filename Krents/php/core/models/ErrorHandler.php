<?php
/**
 * Created by PhpStorm.
 * User: darlane
 * Date: 1/23/18
 * Time: 7:55 PM
 */

namespace Lumisade\Models;


class ErrorHandler
{
    public function handle($errno, $errstr, $errfile, $errline, array $errcontext)
    {
        throw new \ErrorException($errstr);
    }
}