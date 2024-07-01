<?php

use Weather\Iot\Domain\Model\SensorDht;
use Weather\Iot\Infraestructure\Persistence\ConnectionCreator;
use Weather\Iot\Infraestructure\Repository\WeatherSensorDhtRepository;

require_once 'vendor/autoload.php';

$pdo = ConnectionCreator::Connection();
$repository = new WeatherSensorDhtRepository($pdo);

/** Definindo Data e Hora atual */
$timeZone = new DateTimeZone('America/Sao_Paulo');
$dateTime = new \DateTimeImmutable('now', $timeZone);

$pdo->beginTransaction();

try {
    $ch = curl_init();
    $url = "http://172.15.0.23:1280/pintura";

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $resp = curl_exec($ch);
    curl_close($ch);

    if($e = curl_error($ch)) {
        echo $e;
        exit;
    } 

    $obj = json_decode($resp);

    $sensor = new SensorDht(
        null,
        'Pintura 01',
        $dateTime,
        $obj->temperatura,
        $obj->umidade
    );

    $repository->save($sensor);
    $pdo->commit();

}catch (\PDOException $e) {
    $pdo->rollBack();
    $e->getMessage();
}
