<?php

require(SYSTEM.'exceptions/DatabaseException.class.php');

/**
 * MySQLiDatabase klasa koja inicijalizira, selektira, salje upite i spaja se s bazom
 *
 * @author Andrej Grabovac
 */
class MySQLiDatabase{
    public $MySQLi;

    protected $host;
    protected $user;
    protected $password;
    protected $database;

    /**
     * __construct() sprema host, user, password i DB u protetcted varijable
     * te takoder poziva connect() za spajanje na bazu i selectDatabase() za odabir baze
     *
     * @param string $host
     * @param string $user
     * @param string $password
     * @param string $database
     */
    function __construct($host, $user, $password, $database){
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;

        $this->connect();
        $this->selectDatabase();

    }

    /**
     * connect() funkcija sluzi za spajanje na bazu podataka
     * ako se ne uspije spojiti izbaci Exception
     */
    protected function connect(){
        $this-> MySQLi = new MySQLi($this->host,$this->user,$this->password,$this->database);
        if(mysqli_connect_errno()){
            throw new DatabaseException("Spajanje na MySql server '". $this->host ."' neuspješno.");
        }
    }

    /**
     * selectDataBase() funckcija selektira bazu podatak za spajanje
     * ako se uspije izbaci DatabaseException error
     */
    protected function selectDatabase(){
        if($this->MySQLi->select_db($this->database)===false){
            throw new DatabaseException("Nemoguće koristiti bazu ".$this->database);
        }
    }

    /**
     * createDatabase() funkcija kreira bazu podataka ako ne postoji
     * a ako ne uspije kreirati izbaci DatabaseException error
     */
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

    /**
     * sendQuery() salje upit u bazu podataka
     *
     * @param string $sql
     *
     * @return Object $this->result
     */
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