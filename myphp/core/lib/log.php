<?php
/**
 * Created by PhpStorm.
 * User: fancy
 * Date: 12/3/19
 * Time: 11:56 AM
 */
namespace core\lib;
use core\lib\conf;

class log
{
    /**
     * 1. Determine how to save log
     *
     * 2. Write log
     */
    static $class;

    static public function init() {
        $drive = conf::get('DRIVE', 'log');
        $class = '\core\lib\drive\log\\'.$drive;
        self::$class = new $class;
    }

    static public function log($name, $file = 'log') {
        self::$class->log($name, $file);
    }
}