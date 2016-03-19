<?php
/**
 * Desc: test hash table
 * Created by PhpStorm.
 * User: <3048789891@qq.com>
 * Date: 2016/3/19 15:58
 */
require 'createDBTable.php';
require 'hashTable.php';
//require 'hash/bin2hexHashTable.php';
//require 'hash/crc32HashTable.php';
require 'hash/modHashTable.php';

$dbConf = require "DB.php";

//set_time_limit(0);

$dbname = 'test'; //db
$prefix = 'member'; //talbe prefix
$segment = '_'; //segment
$num = 100000; //records nums

$createDBTable = new create($dbConf);
$createDBTable->con();
$createDBTable->createDB($dbname);
$createDBTable->selectDB($dbname);

//$hash = new bin2hexHashTable();
//$hash = new crc32HashTable();
$hash = new modHashTable(10);
$hashTable = new hashTable($hash);

$startTime = time();

for($i=1;$i<=$num;$i++){
    $table = $hashTable->getTable($prefix, $segment, $i);
    $createDBTable->createTable($table);
    $createDBTable->insert($table, 'id, username, password', "'$i', '$i-username', '$i-password'");
}

$endTime = time();
echo "ERROR:";
print_r($createDBTable->getError());
$interval = calcExcuteTime($startTime, $endTime);
echo "time cost:{$interval}秒\n";

function calcExcuteTime($startTime, $endTime){
    $interval = $endTime-$startTime;
    return $interval;
}