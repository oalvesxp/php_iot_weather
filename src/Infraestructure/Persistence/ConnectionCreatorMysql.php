<?php

namespace Weather\Iot\Infraestructure\Persistence;
use PDO;

class ConnectionCreator
{
    public static function Connection(): PDO
    {
        $connection = new PDO(
            dsn: 'mysql:host=127.0.0.1;dbname=database_name',
            username: 'user',
            password: 'passwd'
        );

        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $connection;
    }
}
