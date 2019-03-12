<?php
/**
 * Created by PhpStorm.
 * User: fancy
 * Date: 11/3/19
 * Time: 7:57 PM
 */

namespace core\lib;

use core\lib\conf;

class model extends \PDO
{
    public function __construct()
    {
        $databse = conf::all('database');

        try {
            parent::__construct($databse['DSN'], $databse['USERNAME'], $databse['PWD']);
        } catch (\PDOException $e) {
//            $dsn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            p($e->getMessage());
        }
    }
}
