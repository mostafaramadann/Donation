<?php
class financeController implements Controller
{
    private static $controller=null;
    private function __construct()
    {

    }
    public static function getInstance()
    {
        if (static::$controller == null) {
            self::$controller = new financeController();
        }
        return self::$controller;
    }
    public static function verify($verificationno)
    {

    }
}
?>
