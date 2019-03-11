<?php
/**
 * Created by PhpStorm.
 * User: fancy
 * Date: 11/3/19
 * Time: 4:12 PM
 */

namespace app\controller;
//use core\lib\model;

class indexController extends \core\myphp
{
    public function index()
    {
        $temp = new \core\lib\model();
        $data = 'hello world';
        $this->assign('data', $data);
        $this->display('index.html');
    }
}