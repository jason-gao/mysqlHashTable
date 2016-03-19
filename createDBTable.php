<?php
/**
 * Desc: mysql 创建库和表
 * Created by PhpStorm.
 * User: <3048789891@qq.com>
 * Date: 2016/3/19 14:33
 */
class create{

    const MAXERRORNUM = 200;

    private $error = array();

    private $dbConf;

    private $con;

    public function __construct($dbConf){
        $this->dbConf = $dbConf;
    }

    /**
     * @param $message
     */
    public function error($message){
        if(count($this->error) >= self::MAXERRORNUM){
            array_shift($this->error);
        }
        array_push($this->error, $message);
    }

    /**
     * @return array
     */
    public function getError(){
        return $this->error;
    }

    /**
     *
     */
    public function con(){
        $con = mysql_connect($this->dbConf['host'], $this->dbConf['username'], $this->dbConf['password']);
        if(!$con){
            $this->error('[con]:'.mysql_error());
        }
        $this->con = $con;
    }

    /**
     * @param $sql
     * @return resource
     */
    public function query($sql){
        return mysql_query($sql, $this->con);
    }

    /**
     * @param $db
     * @return bool
     */
    public function selectDB($db){
        return mysql_select_db($db, $this->con);
    }

    /**
     * @param $dbname
     * @return resource
     */
    public function createDB($dbname){
        $sql = "create database if not exists $dbname ";
        $res = $this->query($sql);
        if(!$res){
            $this->error("[createDB]:".mysql_error($this->con));
        }
        return $res;
    }

    /**
     * @param $tableName
     * @return resource
     */
    public function createTable($tableName){
        $sql = "create table if not exists {$tableName} (
                  id int(11) unsigned NOT NULL AUTO_INCREMENT,
                  username varchar(50) NOT NULL,
                  password varchar(50) NOT NULL,
                  PRIMARY KEY (id)
                ) ENGINE=MyISAM DEFAULT CHARSET=utf8";
        $res = $this->query($sql);
        if(!$res){
            $this->error("[createTable]:".mysql_error($this->con));
        }
        return $res;
    }

    /**
     * @param $table
     * @param $field
     * @param $values
     * @return resource
     */
    public function insert($table, $field, $values){
        $sql = "insert into $table($field) VALUES ($values)";
        $res = $this->query($sql);
        if(!$res){
            $this->error("[insert]:".mysql_error($this->con));
        }
        return $res;
    }

    /**
     * @return bool
     */
    public function ping(){
        return mysql_ping($this->con);
    }

    /**
     * @return bool
     */
    public function close(){
        if(is_resource($this->con)){
            return mysql_close($this->con);
        }
    }

    public function __destruct(){
        $this->close();
    }


}