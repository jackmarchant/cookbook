<?php

namespace App;


class Database
{
    public static function connect(array $settings)
    {
        try {
            $host = $settings['host'];
            $database = $settings['dbname'];
            $conn = new \PDO("mysql:host=$host;dbname=$database;port=3306", $settings['username'], $settings['password']);
            $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch(PDOException $e) {
            \error_log('Connection to database failed: ' . $e->getMessage());
        }
    }
}