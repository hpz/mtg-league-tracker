<?php

class Database {
    
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;
    
    private $pdo;
    private $error;
    
    public $dbc;
    
    public function __construct() {
        $dsn = "mysql:host=$this->host;dbname=$this->dbname";
        
        $options = array(
            PDO::ATTR_PERSISTENT => true, 
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        
        try {
            $pdo = new PDO($dsn, $this->user, $this->pass, $options);
        }
        catch (PDOException $e) {
            $this->error = $e->getMessage();
        }
        
        $this->dbc = new NotORM($pdo);
    }
    
}