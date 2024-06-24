<?php

namespace Weather\Iot\Controller;

class FaqController implements Controller
{
    public function processRequest(): void
    {        
        require_once __DIR__ . '/../../views/faq.php';
    }
}
