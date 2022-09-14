<?php
define('SYSTEM', __DIR__.'/');

require(SYSTEM . 'core.functions.php');
require(SYSTEM . 'util/RequestHandler.class.php');
include(SYSTEM . 'model/AbstractPage.class.php');

class AppCore{

    protected static $dbObj;

    function __construct(){
        $this->initOptions();
        $this-> initDB();
        RequestHandler::handle();
    }

    function handleException(\Throwable $e){
        try{
            showErrors($e);
        } catch (Exception $err){
            showErrors($err);
        }
    }

    function initDB(){
        require(SYSTEM . 'config.inc.php');
        require(SYSTEM . 'model/MySQLiDatabase.class.php');

        self::$dbObj = new MySQLiDatabase(db_host, db_user, db_password, db_database);

    }

    public static final function getDB(){
        return self::$dbObj;
    }

    function initOptions(){
        require(SYSTEM . 'options.inc.php');
    }

    public static function autoload($className)
    {
        file_exists($className)
            ? require_once '.system/util/' . $className . '.php'
            : print_r('Ime klase nije pronadeno');
    }
}

?>