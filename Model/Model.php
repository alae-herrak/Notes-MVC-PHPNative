<?php
class Model
{
    private static $db;

    public static function getDB()
    {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO('mysql:host=localhost;dbname=notes', 'root', '');
            } catch (PDOException $e) {
                die("Error: " . $e->getMessage());
            }
        }
        return self::$db;
    }

    public static function ExecuteQuery($sql, $params = [])
    {
        $stmt = self::getDB()->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }
}
