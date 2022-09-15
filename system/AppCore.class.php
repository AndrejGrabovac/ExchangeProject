<?php
define('SYSTEM', '/xampp/htdocs/ExchangeProject/system/');

require(SYSTEM . 'core.functions.php');
require(SYSTEM . 'util/RequestHandler.class.php');
include(SYSTEM . 'model/AbstractPage.class.php');

/**
 * klasa AppCore sadrzi glavne funckije ovog projekta
 *
 * @author Andrej Grabovac
 */
class AppCore{

    protected static $dbObj;

    /**
     * funkcija konstruktor poziva inicijalizaciju baze, loada options.inc te zove funkciju handle()
     */
    function __construct(){
        $this->initOptions();
        $this-> initDB();
        RequestHandler::handle();
    }

    /**
     * handleException() ima parametar objekt oblika Exception koji se prosljeduje funkciji showErrors
     *
     * @param Exception
     */
    function handleException(\Throwable $e){
        try{
            showErrors($e);
        } catch (Exception $err){
            showErrors($err);
        }
    }

    /**
     * initDB() inicijalizira protected $dbObj s parametrima iz config.inc.php
     * te pomocu konstruktora iz MySQLiDatabase.class.php spaja se na bazu podataka
     */
    function initDB(){
        require(SYSTEM . 'config.inc.php');
        require(SYSTEM . 'model/MySQLiDatabase.class.php');

        self::$dbObj = new MySQLiDatabase(db_host, db_user, db_password, db_database);

    }

    /**
     * getDB() vraca $dbObj
     *
     * @return Object
     */
    public static final function getDB(){
        return self::$dbObj;
    }

    /**
     * initOptions() loada sve iz option.inc.php
     */
    function initOptions(){
        require(SYSTEM . 'options.inc.php');
    }

    /**
     * autoload() loada file imena $className.php iz util foldera
     * ako postoji pozvat ce se unutar app cora
     * ako ne postoji printat ce error
     *
     * @param string
     */
    public static function autoload($className)
    {
        file_exists($className)
            ? require_once '.system/util/' . $className . '.php'
            : print_r('Ime klase nije pronadeno');
    }
}

?>