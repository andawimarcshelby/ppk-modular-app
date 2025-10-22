<?php
// backend/check_user_model.php
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$u = new App\Models\User();
echo get_class($u), PHP_EOL;
echo implode(',', $u->getFillable()), PHP_EOL;
echo get_class($u->company()), PHP_EOL;
echo get_class($u->submodules()), PHP_EOL;
