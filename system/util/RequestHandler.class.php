<?php
/**
 * klasa RequestHandler sluzi za obradivanje get zahtjeva iz url-a
 *
 * @author Andrej Grabovac
 */
class RequestHandler
{
    /**
     * ako stranica postoji provjerava da li postoji klasa tog imena, ako postoji poziva se i izvrsava
     * ako ne postoji izbacuje Exception error
     */
    public function __construct($className)
    {
        $className = $className.'Page';
        $classPath = SYSTEM.'control/'.$className.'.class.php';

        if (!preg_match('/^[a-z0-9_]+$/i', $className) || !file_exists($classPath)) {
            throw new Exception("Nevažeči URL!");
        }

        require_once($classPath);

        if (!class_exists($className)) {
            throw new Exception("Klasa '".$className."' nije pronađena!");
        }else{
            new $className();
        }
    }

    /**
     * handle() funkcija pomocu get uzima page koji zovemo te konstruktor proslijedi ime page-a
     * u slucaju da page ne postoji vraca nas na index stranicu
     */
    public static function handle()
    {
        if (!empty($_POST['page']) || !empty($_GET['page'])) {
            new RequestHandler((!empty($_GET['page']) ? $_GET['page'] : $_POST['page']));
        }
        else{
            new RequestHandler('Index');
        }
    }
}
