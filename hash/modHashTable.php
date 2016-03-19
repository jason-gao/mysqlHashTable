<?php
/**
 * Desc: 取模 hash
 * Created by PhpStorm.
 * User: <3048789891@qq.com>
 * Date: 2016/3/19 21:03
 */

require 'Hash.php';

class modHashTable implements Hash{

    private $total;

    public function __construct($total=10){
        $this->total = $total;
    }

    /**
     * @param $id
     * @return int
     */
    public function get_hash($id){
        return  (($id % $this->total) + 1);
    }
}