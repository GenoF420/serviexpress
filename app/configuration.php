<?php

$config = [
    'general' => [
        'sitename' => 'Serviexpress',
        'email'    => 'email@email.email'
    ],
    'database' => [
        'dsn'      => 'mysql:host=localhost;dbname=db_name',
        'username' => 'username',
        'password' => 'pass'
    ]
];

return $config; // Important!

class Config
{
    private static $instances = [];

    protected function __construct() { }

    protected function __clone() { }

    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize a singleton.");
    }

    public static function getInstance(): Config
    {
        $cls = static::class;
        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static();
        }

        return self::$instances[$cls];
    }
}
