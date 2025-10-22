<?php
// backend/check_env.php
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';

// Bootstrap the console kernel so config() is available
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Print values derived from .env (after Laravel loads them)
echo config('database.default') . PHP_EOL;
echo config('app.url') . PHP_EOL;
