<?php
namespace Core;

use PDO;
use PDOException;
use Dotenv\Dotenv;

class Database
{
    private static $connection;
    private static $statement;

    public static function connect()
    {
        if (!isset(self::$connection)) {
            try {
                $dotenv = Dotenv::createImmutable(BASE_PATH);
                $dotenv->load();
                $dotenv->required(['DB_HOST', 'DB_NAME', 'DB_USER']);
                self::$connection = new PDO("mysql:host=".$_ENV['DB_HOST'].";dbname=".$_ENV['DB_NAME']."",$_ENV['DB_USER'],$_ENV['DB_PASS']);
            }catch(PDOException $Exception) {
                echo $Exception->getMessage();
            }
        }
    }

    public static function query($query, $params = [])
    {
        self::$statement = self::$connection->prepare($query);

        self::$statement->execute($params);

        return new self();
    }

    public static function get()
    {
        return self::$statement->fetchAll();
    }

    public static function find()
    {
        return self::$statement->fetch();
    }

    public static function findOrFail()
    {
        $result = self::find();

        if (!$result) {
            abort();
        }

        return $result;
    }

    public static function create($table, $data)
    {
        $keys = array_keys($data);
        $values = array_values($data);

        $fields = implode(',', $keys);
        $placeholders = implode(',', array_fill(0, count($values), '?'));

        $query = "INSERT INTO $table ($fields) VALUES ($placeholders)";

        self::$statement = self::$connection->prepare($query);
        self::$statement->execute($values);

        return new self();
    }
}