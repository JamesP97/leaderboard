<?php

namespace Framework\Interfaces;

use Framework\Response;

interface ControllerInterface
{
    public function index(): Response;
}
