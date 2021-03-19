<?php
class DB {
    var $host;
    var $username;
    var $password;
    var $database;
    var $connection;

    public function __construct($host,$username,$password,$database) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
        //connect to the database with parameter
        $this->connection = new mysqli($this->host,$this->username,$password,$this->database);
        
        return $this;
    }

    public function query($query_string) {
        return $this->connection->query($query_string);
    }
}

require './env.php';

$db_connect = new DB($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);