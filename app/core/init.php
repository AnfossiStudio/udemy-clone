<?php
require __DIR__ . '/../../vendor/autoload.php';

use App\Core\Config;
use App\Core\Http\Request;
use App\Core\Http\Response;
use App\Core\Http\Route;

Config::init();

require __DIR__ . '/../../routes/web.php';

$router = new Route(new Request, new Response);

$router->resolve();
