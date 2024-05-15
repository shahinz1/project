<?php
require_once "app.php";

class DatabaseCon {
    public static $pdo;
    static function connection()
    {
        try {
            self::$pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_DATABASE, DB_USERNAME, DB_PASSWORD);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return self::$pdo;
    }
    static function preparation($sql)
    {
        return self::connection()->prepare($sql);
    }
}

?>