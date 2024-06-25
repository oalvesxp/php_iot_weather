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

    public function getSensorDhtPintura(): array
    {
        $qry = "
            SELECT * FROM WT0010 
            WHERE WT0_NAME = 'Pintura 01'
            ORDER BY WT0_ID DESC LIMIT 1;
        ";

        $stmt = $this->connection->prepare($qry);
        $stmt->execute();
        $sensor = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return array_map(
            $this->hydrateSensors(...),
            $sensor
        );
    }

    public function getSensorDhtVerniz(): array
    {
        $qry = "
            SELECT * FROM WT0010 
            WHERE WT0_NAME = 'Verniz 01'
            ORDER BY WT0_ID DESC LIMIT 1;
        ";

        $stmt = $this->connection->prepare($qry);
        $stmt->execute();
        $sensor = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return array_map(
            $this->hydrateSensors(...),
            $sensor
        );
    }

    public function getLastHour(): array
    {
        $qry = "
            SELECT * FROM WT0010 
            WHERE 
                WT0_TIME BETWEEN :start AND :end;
        ";

        $start = date('Y-m-d\\ H:i:s', strtotime('-4 hour'));
        $end = date('Y-m-d\\ H:i:s', strtotime('-3 hour'));

        $stmt = $this->connection->prepare($qry);
        
        $stmt->bindValue(':start', $start);
        $stmt->bindValue(':end', $end);
        $stmt->execute();

        $sensors = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return array_map(
            $this->hydrateSensors(...),
            $sensors
        );
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
