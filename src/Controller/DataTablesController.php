<?php

namespace Weather\Iot\Controller;

class DataTablesController implements Controller
{
    public function processRequest(): void
    {        
        require_once __DIR__ . '/../../views/tables.php';
    }
}
