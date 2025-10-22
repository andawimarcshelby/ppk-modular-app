<?php
// backend/check_module_model.php
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$m = new App\Models\Module();
echo get_class($m), PHP_EOL;
echo implode(',', $m->getFillable()), PHP_EOL;
echo get_class($m->system()), PHP_EOL;
echo get_class($m->submodules()), PHP_EOL;
