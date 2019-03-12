<?php
/**
 * Created by PhpStorm.
 * User: fancy
 * Date: 11/3/19
 * Time: 12:48 PM
 */
namespace core\lib;
use core\lib\conf;

class route
{
    public $ctrl;
    public $action;

    public function __construct()
    {
        // xxx.com/index/index
        /*
         * 1. hide .php
         * 2. get URL param
         * 3. return controller and function
         */

        if(isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI']!='/') {
            $path = $_SERVER['REQUEST_URI'];
            $patharr = explode('/', trim($path,'/'));
            if(isset($patharr[0])) {
                $this->ctrl = $patharr[0];
            }
            unset($patharr[0]);
            if(isset($patharr[1])) {
                $this->action = $patharr[1];
                unset($patharr[1]);
            } else {
                $this->action = conf::get('ACTION', 'route');
            }
            // url多余部分 转换成 GET
            $count = count($patharr) + 2;
            $i = 2;
            while($i < $count) {
                if(isset($patharr[$i + 1])){
                    $_GET[$patharr[$i]] = $patharr[$i + 1];
                }
                $i = $i + 2;
            }

        } else {
            $this->ctrl = conf::get('CTRL', 'route');
            $this->action = conf::get('ACTION', 'route');

        }
    }



}