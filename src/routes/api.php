<?php

use App\Controllers\IndexController;
use Framework\Router;

$router = new Router();

$router->add('GET', '/', new IndexController(), 'index');

$router->load();
