<?php

declare(strict_types=1);

use Framework\App;

use function App\Config\registerRoutes;

include_once __DIR__ . '/../../vendor/autoload.php';

$app = new App();
registerRoutes($app);
return $app;
