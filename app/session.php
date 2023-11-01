<?php

class Session
{
    private static $instances = [];

    protected function __construct() { }

    protected function __clone() { }

    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize a singleton.");
    }

    public static function getInstance(): Session
    {
        $cls = static::class;
        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static();
        }

        return self::$instances[$cls];
    }

    public function Get($key) {
        if (session_status() === PHP_SESSION_ACTIVE) {
            if(isset($_SESSION[$key])) {
                return $_SESSION[$key];
            }
        }
        return null;
    }

    public function Set($key, $val) {
        if (session_status() === PHP_SESSION_ACTIVE) {
            $_SESSION[$key] = $val;
        }
    }

    public function Destroy() {
        session_destroy();
    }

    public function Authenticate($email, $password): true|string
    {
        if($email == "juan@serviexpress.cl" && $password == "1234567890") {
            return true;
        } else {
            return "Credenciales invalidas!";
        }
    }
}
