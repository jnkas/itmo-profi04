<?php
/**
 * Created by PhpStorm.
 * User: darlane
 * Date: 1/18/18
 * Time: 9:08 PM
 */

class Autoloader
{
    public static function registerClasses($directory, $first = false)
    {
        $dirs = array_filter(glob($directory.'/*'), 'is_dir');
        foreach ($dirs as $dir) {
            if ($dir === APP_PATH.'/views' || $dir === APP_PATH.'/public') {
                continue;
            }
            $classes = glob($dir.'/*.php');
            foreach ($classes as $class) {
                if ($dir.'/framework/app.php' !== $class) {
                    require_once $class;
                }
            }
            if (count(array_filter(glob($dir.'/*'), 'is_dir')) > 0) {
                self::registerClasses($dir);
            }
        }
    }

}