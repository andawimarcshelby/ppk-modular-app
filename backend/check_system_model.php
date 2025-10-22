<?php
// backend/check_system_model.php
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$m = new App\Models\System();
echo get_class($m), PHP_EOL;
echo implode(',', $m->getFillable()), PHP_EOL;
echo get_class($m->modules()), PHP_EOL;
