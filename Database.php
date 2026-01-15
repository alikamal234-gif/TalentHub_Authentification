<?php

class Database {
    private string $host = "localhost";
    private string $user = "root";
    private string $password = "";
    private string $dbname = "talenthub";
    private $conn;
    private static $instance = null ;

    public function __construct(){
        try{
            $this->conn = new PDO("mysql:host=".$this->host."dbname=".$this->dbname,$this->user,$this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION,);
        }catch(Exception $e){
            die('error database');
        }
    }
    public static function getInstance(){
        if(self::$instance == null){
            self::$instance = new self();
        }
        return self::$instance;
    }
    public function getConnection(){
        return $this->conn;
    }
}

$db = Database::getInstance()->getConnection();