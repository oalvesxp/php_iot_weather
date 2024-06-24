<?php

use Weather\Iot\Domain\Model\SensorDht;

require_once 'vendor/autoload.php';

$timeZone = new DateTimeZone('America/Sao_Paulo');
$dateTime = new \DateTimeImmutable('now', $timeZone);

$sensor01 = new SensorDht(
    null,
    'Pintura 01',
    $dateTime,
    26.3,
    48.7
);

var_dump($sensor01);
