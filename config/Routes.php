<?php

return [
    'GET|/' => \Weather\Iot\Controller\HomeController::class,
    'GET|/table-short' => \Weather\Iot\Controller\ShortTableController::class,
    'GET|/table-full' => \Weather\Iot\Controller\FullTableController::class,
    'GET|/faq' => \Weather\Iot\Controller\FaqController::class,
];
