<?php

return [
    'GET|/' => \Weather\Iot\Controller\HomeController::class,
    'GET|/tables' => \Weather\Iot\Controller\DataTablesController::class,
    'GET|/faq' => \Weather\Iot\Controller\FaqController::class,
];
