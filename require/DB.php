<?php
class DB{

    var $host;
    var $username;
    var $password;
    var $database;
    var $connection;

    public function __construct($host,$username,$password,$database){
        $this->host = $host;
        $this->username = $username;
        $this->password =$password;
        $this->database = $database;
        //connect to the database with parameter
        $this->connection = new mysqli($this->host,$this->username,$password,$this->database);
        
        return $this;
    }


    public function query($query_string){
        return $this->connection->query($query_string);
    }

}


$database = new DB('localhost:3333', 'root', '', 'payroll');