<?php

namespace Weather\Iot\Domain\Repository;

use Weather\Iot\Domain\Model\SensorDht;

interface SensorDhtRepository 
{
    public function save(SensorDht $sensor): bool;
}
