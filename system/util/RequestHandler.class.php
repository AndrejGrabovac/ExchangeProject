<?php
class RequestHandler{

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
