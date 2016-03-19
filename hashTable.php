<?php
/**
 * Desc: hash 分表
 * Created by PhpStorm.
 * User: <3048789891@qq.com>
 * Date: 2016/3/19 15:53
 */
class hashTable{

    private $hashTable;

    public function __construct($hashTable){
        $this->hashTable = $hashTable;
    }

    /**
     * @param $prefix
     * @param $segment
     * @param $id
     * @return string
     */
    public function getTable($prefix,$segment, $id){
        $hash = $this->hashTable->get_hash($id);
        $table = "$prefix$segment$hash";
        return $table;
    }

}