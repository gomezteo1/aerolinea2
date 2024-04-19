<?php
class Db {
    private static $instance = null;
    private static $host = 'localhost';
    private static $dbname = 'aerolinea';
    private static $username = 'root';
    private static $password = '';
    private static $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];

    private function __construct() {}
    private function __clone() {}

    public static function getConnect() {
        if (!isset(self::$instance)) {
            try {
                self::$instance = new PDO(
                    'mysql:host=' . self::$host . ';dbname=' . self::$dbname,
                    self::$username,
                    self::$password,
                    self::$options
                );
            } catch (PDOException $e) {
                die('Connection failed: ' . $e->getMessage());
            }
        }
        return self::$instance;
    }
}
?>