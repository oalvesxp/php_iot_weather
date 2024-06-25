<?php

namespace Weather\Iot\Domain\Repository;

use Weather\Iot\Domain\Model\SensorDht;

interface SensorDhtRepository 
{
    public function getLastHour(): array;
    public function getAll(): array;
    public function hydrateSensors(array $data): SensorDht;
    public function save(SensorDht $sensor): bool;
}
