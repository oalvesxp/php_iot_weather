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

    public function getAll(): array
    {
        $qry = "
            SELECT * FROM WT0010;
        ";
        
        $sensors = $this->connection
            ->query($qry)
            ->fetchAll(PDO::FETCH_ASSOC);

        return array_map(
            $this->hydrateSensors(...),
            $sensors
        );
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
            ':time' => $sensor->timeConvert(),
            ':temp' => $sensor->temperature,
            ':hum' => $sensor->humidity
        ]);

        return $success;
    }

    /** @return SensorDht */
    public function hydrateSensors(array $data): SensorDht
    {
        $sensor = new SensorDht(
            $data['WT0_ID'],
            $data['WT0_NAME'],
            new \DateTimeImmutable($data['WT0_TIME']),
            $data['WT0_TEMP'],
            $data['WT0_HUM']
        );

        return $sensor;
    }

}
