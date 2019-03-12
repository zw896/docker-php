<?php
/**
 * Created by PhpStorm.
 * User: fancy
 * Date: 11/3/19
 * Time: 7:57 PM
 */

namespace core\lib;

use core\lib\conf;

class model extends \Medoo\Medoo
{
    public function __construct()
    {
//        $databse = conf::all('database');
//
//        try {
//            parent::__construct($databse['DSN'], $databse['USERNAME'], $databse['PWD']);
//        } catch (\PDOException $e) {
//            p($e->getMessage());
//        }

        $option = conf::all('database');
        parent::__construct($option);
    }
}
