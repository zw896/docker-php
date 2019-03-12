<?php
/**
 * Created by PhpStorm.
 * User: fancy
 * Date: 12/3/19
 * Time: 11:58 AM
 */
//save log in drive
namespace core\lib\drive\log;

use core\lib\conf;

class file
{
    public $path;

    public function __construct()
    {
        $conf = conf::get('OPTION', 'log');
        $this->path = $conf['PATH'];
    }

    //write to log
    public function log($message, $file = 'log')
    {
        /**
         * 1. Confirm the existence of the file directory
         * New directory
         * 2. Write to the log
         */
        if(!is_dir($this->path.date('YmdH'))){
            mkdir($this->path.date('YmdH'),'0777',true);
        }

//        P($this->path.$file.'.php');exit();
        return file_put_contents($this->path.date('YmdH').'/'.$file.'.php',date('Y-m-d H:i:s').json_encode($message).PHP_EOL, FILE_APPEND);

    }
}