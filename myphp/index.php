<?php
/**
 * 入口文件
 * 1.定义常量
 * 2.加载函数库
 * 3.启动框架
 */

/*
 * define
 */
define('MYPHP', realpath('./'));
define('CORE', MYPHP.'/core');
define('APP', MYPHP.'/app');
define('MODULE', 'app');
//include "vendor/autoload.php";
define('DEBUG', true);
if(DEBUG) {

    ini_set('display_errors','On');
} else {
    ini_set('display_errors','Off');
}

/*
 * load
 */
include CORE.'/common/function.php';
include CORE.'/myphp.php';

spl_autoload_register('\core\myphp::load');

\core\myphp::run();

//p(MYPHP);