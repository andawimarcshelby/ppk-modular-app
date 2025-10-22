<?php
// backend/check_company_model.php
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$m = new App\Models\Company();
echo get_class($m), PHP_EOL;
echo implode(',', $m->getFillable()), PHP_EOL;
echo get_class($m->users()), PHP_EOL;
