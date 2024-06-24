<?php

use Weather\Iot\Domain\Model\SensorDht;
use Weather\Iot\Infraestructure\Persistence\ConnectionCreator;
use Weather\Iot\Infraestructure\Repository\WeatherSensorDhtRepository;

require_once 'vendor/autoload.php';

$pdo = ConnectionCreator::Connection();
$repository = new WeatherSensorDhtRepository($pdo);

$pdo->beginTransaction();

try {

    $sensor = new SensorDht( 
        null,
        'Verniz 01',
        new \DateTimeImmutable('2024-06-24 08:17:24'),
        28.4,
        45.3
    );
    
    $repository->save($sensor);
    $pdo->commit();

}catch (\PDOException $e) {
    $pdo->rollBack();
    $e->getMessage();
}
