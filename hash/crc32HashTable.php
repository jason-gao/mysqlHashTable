<?php
/**
 * Desc: crc32 Hash Table
 * Created by PhpStorm.
 * User: <3048789891@qq.com>
 * Date: 2016/3/19 21:02
 */
require 'Hash.php';

class crc32HashTable implements Hash{

    /**
     * @param $id
     * @return string|void
     */
    public function get_hash($id){
        $str = crc32($id);

        if ($str < 0) {
            $hash = "0" . substr(abs($str), 0, 1);
        } else {
            $hash = substr($str, 0, 2);
        }

        return $hash;
    }
}