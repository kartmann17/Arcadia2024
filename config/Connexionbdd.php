<?php

namespace App\config;

use PDO;

class Connexionbdd extends PDO
{
    private static $instance;

    /**
     * Initializes the Db instance.
     *
     * Sets up the connection with default fetch mode set to object.
     */
    private function __construct()
    {
        $dsn = 'mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_NAME'];
        parent::__construct($dsn, $_ENV['DB_USER'], $_ENV['DB_PASS']);
        $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
     * Returns the singleton instance of the database connection.
     *
     * @return self
     */
    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}
