<?php
/**
 * Created by PhpStorm.
 * User: fancy
 * Date: 11/3/19
 * Time: 12:42 PM
 */

namespace core;

class myphp
{
    public static $classMap = array();
    public $assign;

    /*
     * start framework
     */
    static public function run()
    {
//        \core\lib\log::init();
        // \core\lib\log::log($_SERVER);
        $route = new \core\lib\route();

        $ctrlClass = $route->ctrl;
        $action = $route->action;

        $ctrlfile = APP.'/controller/'.$ctrlClass.'Controller.php';
        $cltrlClass = '\\'.MODULE.'\controller\\'.$ctrlClass.'Controller';


        if(is_file($ctrlfile)) {
            include $ctrlfile;
            $ctrl = new $cltrlClass;
            $ctrl->$action();
        } else {
            throw new \Exception('Cannot find controller'.$ctrlClass);
        }
    }

    static public function load($class)
    {
        //auto load class
        //new \core\route()
        //convert $class = '\core\route';
        //to MYPHP.'/core/route.php';

        //if loaded
        if(isset($classMap[$class])){
            return true;
        } else {
            $class = str_replace('\\', '/', $class);
            $file = MYPHP .'/'. $class. '.php';
            if (is_file($file)) {
                include $file;
                self::$classMap[$class] = $class;
            } else {
                return false;
            }
        }
    }

    public function assign($name, $value)
    {
        $this->assign[$name] = $value;
    }

    public function display($file)
    {
        $file = APP.'/views/'.$file;
//        p($file);

        if(is_file($file)) {
            extract($this->assign);
            include $file;
        }

//        $file = APP.'/views'.$file;
//
//        if(is_file($file)) {
//
//            $loader = new \Twig_Loader_Filesystem(APP.'/views');
//            $twig = new \Twig_Environment($loader, array(
//                'cache' => MYPHP.'/log',
//            ));
//            $template = $twig->load('index.html');
//            $template->render($this->assign?$this->assign:'');
//        }
    }
}