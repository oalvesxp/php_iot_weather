<?php

namespace Weather\Iot\Controller;

class HomeController implements Controller
{
    public function processRequest(): void
    {        
        require_once __DIR__ . '/../../views/home.php';
    }
}
