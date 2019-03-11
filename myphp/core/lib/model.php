<?php
/**
 * Created by PhpStorm.
 * User: fancy
 * Date: 11/3/19
 * Time: 7:57 PM
 */

namespace core\lib;

class model extends \PDO
{
    public function __construct()
    {
        //
        $dsn = 'mysql:host=mysql;dbname=myphp';
        $username = 'root';
        $password = 'root';
        try {
            parent::__construct($dsn, $username, $password);
        } catch (\PDOException $e) {
//            $dsn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            p($e->getMessage());
        }
    }
}
