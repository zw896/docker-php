<?php
/**
 * Created by PhpStorm.
 * User: fancy
 * Date: 12/3/19
 * Time: 10:39 PM
 */

namespace app\model;

use core\lib\model;

class User extends model
{
    public $table = 'test';
    public function lists()
    {
        $result = $this->select($this->table,'*');
        return $result;
    }

    public function getOne($id)
    {
        $result = $this->get($this->table,'*',array(
            'id'=>$id
        ));
        return $result;
    }

    public function setOne($id, $data)
    {
        return $this->update($this->table, $data, array(
            'id'=>$id
        ));
    }

    public function delOne($id)
    {
        return $this->update($this->table, array(
            'id'=>$id
        ));
    }


}