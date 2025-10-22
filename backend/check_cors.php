<?php
// backend/check_cors.php
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "paths: " . implode(',', (array) config('cors.paths', [])) . PHP_EOL;
echo "allowed_origins: " . implode(',', (array) config('cors.allowed_origins', [])) . PHP_EOL;
echo "supports_credentials: " . (config('cors.supports_credentials') ? 'true' : 'false') . PHP_EOL;
