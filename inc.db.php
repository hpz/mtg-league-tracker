<?php

require_once("NotORM\NotORM.php");

$pdo = new PDO("mysql:dbname=league", root);

$db = new NotORM($pdo);

$db->debug = true;

class db{

    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;
 
    private $dbh;
    private $error;
    
    private $stmt;
    
    public function __construct(){
        $dsn = "mysql:host=$this->host;dbname=$this->dbname";
        
        // Set options
        $options = array(
            PDO::ATTR_PERSISTENT => true, 
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        
        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        }
        catch (PDOException $e) {
            $this->error = $e->getMessage();
        }
        
    }
    
    public function query($query){
        $this->stmt = $this->dbh->prepare($query);
    }
    
    public function bind($param, $value, $type = null){
        
    }
    
}