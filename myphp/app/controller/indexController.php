<?php
/**
 * Created by PhpStorm.
 * User: fancy
 * Date: 11/3/19
 * Time: 4:12 PM
 */

namespace app\controller;
//use core\lib\model;

class indexController
{
    public function index()
    {
//        p('it is indexController');
        $model = new \core\lib\model();
        $sql = "SELECT * FROM test";
        $ret = $model->query($sql);
        p($ret->fetchAll());

    }
}