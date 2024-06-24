<?php

namespace Weather\Iot\Controller;

use Weather\Iot\Infraestructure\Repository\WeatherSensorDhtRepository;

class DataTablesController implements Controller
{
    public function __construct(
        WeatherSensorDhtRepository $repository
    )
    {}

    public function processRequest(): void
    {
        require_once __DIR__ . '/../../views/data-table.php';
    }
}
