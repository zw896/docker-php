<?php
/**
 * Created by PhpStorm.
 * User: fancy
 * Date: 12/3/19
 * Time: 9:17 AM
 */

namespace core\lib;

class conf
{
    static public $conf = array();

    static public function get($name, $file)
    {

        /**
         * 1. Determine if the configuration file exists.
         * 2. Determine if the configuration exists
         * 3. Cache configuration
         */
//        p(self::$conf);

        if(isset(self::$conf[$file])){
            return self::$conf[$file][$name];
        } else {
            $path = MYPHP . '/core/config/' . $file . '.php';
            if (is_file($path)) {
                $conf = include $path;
                if (isset($conf[$name])) {
                    self::$conf[$file] = $conf;
                    return $conf[$name];
                } else {
                    throw new \Exception('No configuration option' . $name);
                }
            } else {
                throw new \Exception('Cannot find configuration file' . $file);
            }
        }
    }

    static public function all($file)
    {
        if(isset(self::$conf[$file])){
            return self::$conf[$file];
        } else {
            $path = MYPHP . '/core/config/' . $file . '.php';
            if (is_file($path)) {
                $conf = include $path;
                self::$conf[$file] = $conf;
                return $conf;
            } else {
                throw new \Exception('Cannot find configuration file' . $file);
            }
        }
    }
}