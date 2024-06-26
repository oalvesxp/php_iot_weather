<?php

use Weather\Iot\Controller\{
    HomeController
    , ShortTableController
    , FullTableController
    , FaqController
};

return [
    'GET|/' => HomeController::class,
    'GET|/table-short' => ShortTableController::class,
    'GET|/table-full' => FullTableController::class,
    'GET|/faq' => FaqController::class,
];
