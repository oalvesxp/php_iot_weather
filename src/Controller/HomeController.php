<?php

namespace Weather\Iot\Controller;

use Weather\Iot\Infraestructure\Repository\WeatherSensorDhtRepository;

class HomeController implements Controller
{
    public function __construct(private WeatherSensorDhtRepository $repository) 
    {}

    public function processRequest(): void
    {   
        $pintura = $this->repository->getSensorDhtPintura();
        $verniz = $this->repository->getSensorDhtVerniz();
        require_once __DIR__ . '/../../views/home.php';
    }
}
