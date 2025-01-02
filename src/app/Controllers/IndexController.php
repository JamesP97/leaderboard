<?php

namespace App\Controllers;

use Framework\Interfaces\ControllerInterface;
use Framework\Response;

class IndexController implements ControllerInterface
{
    public function index(): Response
    {
        return new Response([
            'Welcome!'
        ]);
    }
}
