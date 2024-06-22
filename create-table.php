<?php

use Weather\Iot\Infraestructure\Persistence\ConnectionCreator;

require_once 'vendor/autoload.php';

$pdo = ConnectionCreator::Connection();
$qry = "
    CREATE TABLE IF NOT EXISTS
        WT0010 (
            WT0_ID INTEGER PRIMARY KEY
            , WT0_NAME VARCHAR(50)
            , WT0_TIME DATETIME
            , WT0_TEMP FLOAT(0,0)
            , WT0_HUM FLOAT(0,0)
        );
";

$pdo->exec($qry);
