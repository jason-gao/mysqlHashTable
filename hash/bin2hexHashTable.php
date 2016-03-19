<?php
/**
 * Desc: bin2hex hash table
 * Created by PhpStorm.
 * User: <3048789891@qq.com>
 * Date: 2016/3/19 20:59
 */
require 'Hash.php';

class bin2hexHashTable implements Hash{
    /**
     * @param $id
     * @return string|void
     */
    public function get_hash($id){
        $str = bin2hex($id);
        $hash = substr($str, 0, 4);
        if (strlen($hash)<4){
            $hash = str_pad($hash, 4, "0");
        }
        return $hash;
    }
}