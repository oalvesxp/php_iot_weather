<?php

use Weather\Iot\Infraestructure\Persistence\ConnectionCreator;

require_once 'vendor/autoload.php';

$pdo = ConnectionCreator::Connection();

var_dump($pdo);