<?php
/**
 * Created by PhpStorm.
 * User: fancy
 * Date: 11/3/19
 * Time: 12:28 PM
 */

function p($var){
//    dump($var);
    if(is_bool($var)){
        var_dump($var);
    }else if(is_null($var)){
        var_dump(NULL);
    } else{
        echo "<pre style='font-size:14px;border-radius:5px;border:1px solid #aaa;'>".print_r($var,true)."\</pre>";
    }
}