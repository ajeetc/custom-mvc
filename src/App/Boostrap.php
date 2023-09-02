<?php

declare(strict_types=1);

use App\Controllers\AboutController;
use App\Controllers\HomeController;
use Framework\App;

include_once __DIR__ . '/../../vendor/autoload.php';

$app = new App();
$app->get('/', [HomeController::class, 'home']);
$app->get('/about', [AboutController::class, 'about']);
return $app;
