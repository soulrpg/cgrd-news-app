<?php

namespace Soulrpg\CgrdNewsApp\Utility;

class DbConnection
{
    static public function getDatabaseConnection(): \PDO
    {
        $host = $_ENV['MYSQL_URL'];
        $db = $_ENV['MYSQL_DB'];
        $user = $_ENV['MYSQL_USER'];
        $password = $_ENV['MYSQL_PASSWORD'];
        $charset = $_ENV['CHARSET'];

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES => false,
        ];
        return new \PDO($dsn, $user, $password, $options);
    }
}
