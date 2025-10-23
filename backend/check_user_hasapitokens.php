<?php
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$u = new App\Models\User();
echo 'createToken_exists=' . (method_exists($u, 'createToken') ? 'yes' : 'no') . PHP_EOL;
