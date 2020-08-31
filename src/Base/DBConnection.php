<?php

namespace BeeJee\Web\Base;
use PDO;
class DBConnection{
    private $server = 'test-task5.zzz.com.ua';
    private $username = 'alisaweb1';
    private $pwd = 'Root_web2020';
    private $db_name = 'test_domen';
private $options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
];

private static $dbConnection;

private function __construct(){}

public static function getInstance(){
    if (self::$dbConnection == null){
        self::$dbConnection = new DBConnection();
    }
    return self::$dbConnection;
}

public function getConnection(){
    return $this->dbConnection =
        new PDO("mysql:host=$this->server;dbname=$this->db_name",
            $this->username, $this->pwd, $this->options);
}


    public function queryAll($sql){
        $statement = $this->dbConnection->query($sql);
        if (!$statement) return false;
        return $statement->fetchAll();
    }

    public function exec($sql){
        return $statement = $this->dbConnection->exec($sql);
    }

    public function execute($sql, $params, $all = true){
        $statement = $this->dbConnection->prepare($sql);
        $statement->execute($params);

        if (!$all){
            return $statement->fetch();
        }
        return $statement->fetchAll();
    }

    public function executeSql($sql, $params){
        $statement = $this->dbConnection->prepare($sql);
        $statement->execute($params);
    }
}