<?php

require(SYSTEM.'exceptions/DatabaseException.class.php');

class MySQLiDatabase{
    public $MySQLi;

    protected $host;
    protected $user;
    protected $password;
    protected $database;

    function __construct($host, $user, $password, $database){
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;

        $this->connect();
        $this->selectDatabase();

    }

    protected function connect(){
        $this-> MySQLi = new MySQLi($this->host,$this->user,$this->password,$this->database);
        if(mysqli_connect_errno()){
            throw new DatabaseException("Spajanje na MySql server '". $this->host ."' neuspješno.");
        }
    }

    protected function selectDatabase(){
        if($this->MySQLi->select_db($this->database)===false){
            throw new DatabaseException("Nemoguće koristiti bazu ".$this->database);
        }
    }

    public function createDatabase(){
        try{
            $this->selectDatabase();
        }
        catch(DatabaseException $e){
            try{
                $this->sendQuery("CREATE DATABASE IF NOT EXISTS '".$this->database."'");
            }
            catch(DatabaseException $e2){
                throw new DatabaseException("Nemoguće kreirati bazu ".$this->database);
            }
        }
    }

    public function sendQuery($sql){

        $this->result = $this->MySQLi->query($sql);
        if($this->result === false){
            throw new DatabaseException("Nevaljali SQL: ".$sql);
        }
        return $this->result;
    }

    function fetchArray($result) {
        return $result->fetch_array();
    }

    function escapeString($string) {
        return $this->MySQLi->real_escape_string($string);
    }
}

?>