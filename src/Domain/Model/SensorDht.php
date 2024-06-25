<?php

namespace Weather\Iot\Domain\Model;

class SensorDht
{
    public function __construct(
        public readonly ?int $id,
        public readonly string $name,
        public readonly \DateTimeInterface $time,
        public readonly float $temperature,
        public readonly float $humidity,
    )
    {
        
    }

    public function timeConvert(): string
    {
        return $this->time->format('Y-m-d\\ H:i:s');
    }
}
