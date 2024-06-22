<?php

namespace Weather\Iot\Infraestructure\Persistence;
use PDO;

class ConnectionCreator
{
    public static function Connection(): PDO
    {
        $dir = __DIR__ . '/../../../base_weather.sqlite';
        $connection = new PDO('sqlite:' . $dir);

        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $connection;
    }
}
