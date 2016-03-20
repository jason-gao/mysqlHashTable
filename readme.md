#Mysql hash 分表
+   http://database.51cto.com/art/201010/230178.htm
+   http://www.phpddt.com/php/mysql-tables.html

#运行demo
+   配置DB.php为自己的数据库设置
+   php testHashTable.php

#支持3种hash，也可以自己在扩展

//require 'hash/bin2hexHashTable.php';

//require 'hash/crc32HashTable.php';

require 'hash/modHashTable.php';

//$hash = new bin2hexHashTable();

//$hash = new crc32HashTable();

$hash = new modHashTable(10);

$hashTable = new hashTable($hash);


