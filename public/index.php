<?php

use Weather\Iot\Controller\Error404Controller;

require_once __DIR__ . '/../connection.php';
require_once __DIR__ . '/../vendor/autoload.php';

/** Configuração de Rotas */
$routes = require_once __DIR__ . '/../config/Routes.php';
$pathInfo = $_SERVER['REQUEST_URI'] ?? '/';
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
