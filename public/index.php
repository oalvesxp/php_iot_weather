<?php

use Weather\Iot\Controller\Error404Controller;
use Weather\Iot\Infraestructure\Persistence\ConnectionCreator;
use Weather\Iot\Infraestructure\Repository\WeatherSensorDhtRepository;

require_once __DIR__ .'/../vendor/autoload.php';

/** Conexão com a base de dados */
$pdo = ConnectionCreator::Connection();
$repository = new WeatherSensorDhtRepository($pdo);

/** Configuração de Rotas */
$routes = require_once __DIR__ . '/../config/Routes.php';
$pathInfo = $_SERVER['PATH_INFO'] ?? '/';
$httpMethod = $_SERVER['REQUEST_METHOD'];

$key = "$httpMethod|$pathInfo";

if (array_key_exists($key, $routes)) {
    $controllerClass = $routes[$key];

    /** @var Controller */
    $controller = new $controllerClass($repository);

}else {
    $controller = new Error404Controller();
}

/** @var Controller */
$controller->processRequest();
