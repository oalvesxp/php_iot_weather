<?php

namespace Weather\Iot\Infraestructure\Repository;

use PDO;
use Weather\Iot\Domain\Model\SensorDht;
use Weather\Iot\Domain\Repository\SensorDhtRepository;

class WeatherSensorDhtRepository implements SensorDhtRepository
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function save(SensorDht $sensor): bool
    {
        $qry = "
            INSERT INTO WT0010 
                (WT0_NAME, WT0_TIME, WT0_TEMP, WT0_HUM)
            VALUES
                (:name, :time, :temp, :hum)
        ";
        $stmt = $this->connection->prepare($qry);

        $success = $stmt->execute([
            ':name' => $sensor->name,
            ':time' => $sensor->timeConvert()->format('Y-m-d \\ H:i:s'),
            ':temp' => $sensor->temperature,
            ':hum' => $sensor->humidity
        ]);

        return $success;
    }

}
