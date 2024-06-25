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
        new \DateTimeImmutable('2024-06-25 13:36:24'),
        19.2,
        29.3
    );
    
    $repository->save($sensor);
    $pdo->commit();

}catch (\PDOException $e) {
    $pdo->rollBack();
    $e->getMessage();
}
