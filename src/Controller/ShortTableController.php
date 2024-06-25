<?php

namespace Weather\Iot\Controller;

use Weather\Iot\Infraestructure\Repository\WeatherSensorDhtRepository;

class ShortTableController implements Controller
{
    public function __construct(private WeatherSensorDhtRepository $repository) 
    {}

    public function processRequest(): void
    {   
        $sensors = $this->repository->getLastHour();
        require_once __DIR__ . '/../../views/table-short.php';
    }
}
