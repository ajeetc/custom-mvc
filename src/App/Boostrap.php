<?php

declare(strict_types=1);

use Framework\App;

include_once __DIR__ . '/../../vendor/autoload.php';

$app = new App();
$app->get('/');
return $app;
