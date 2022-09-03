<?php

define('DB_HOST', 'mysql');
define('DB_USER', 'user');
define('DB_PASSWORD', 'userhaslo');
define('DB_DATABASE', 'apidb');

class ConnectDb
{
    /**
     * @var PDO
     */
    public $conn;

    public function __construct()
    {
        try {
            $conn = new PDO("mysql:host=" . DB_HOST . ";port=3306;dbname=" . DB_DATABASE, DB_USER, DB_PASSWORD);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

        return $this->conn = $conn;
    }
}