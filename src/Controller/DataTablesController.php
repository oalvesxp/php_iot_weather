<?php

namespace Weather\Iot\Controller;

use Weather\Iot\Infraestructure\Repository\WeatherSensorDhtRepository;

class DataTablesController implements Controller
{
    public function __construct(
        private WeatherSensorDhtRepository $repository
    )
    {}

    public function processRequest(): void
    {
        $sensors = $this->repository->getAll();
        require_once __DIR__ . '/../../views/data-table.php';
    }
}
