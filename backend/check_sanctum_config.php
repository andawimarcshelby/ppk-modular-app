<?php
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo 'expiration=' . var_export(config('sanctum.expiration'), true) . PHP_EOL;
$stateful = config('sanctum.stateful');
echo 'stateful_first=' . (is_array($stateful) ? reset($stateful) : 'N/A') . PHP_EOL;
echo 'guard=' . implode(',', (array) config('sanctum.guard')) . PHP_EOL;
