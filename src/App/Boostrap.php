<?php

declare(strict_types=1);

use App\Config\Paths;
use Framework\App;

use function App\Config\registerRoutes;

include_once __DIR__ . '/../../vendor/autoload.php';
$app = new App(Paths::SOURCE . 'App/container-definitions.php');
registerRoutes($app);
return $app;
