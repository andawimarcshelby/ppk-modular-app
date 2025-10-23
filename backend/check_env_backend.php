<?php
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

printf("app_url=%s\n", config('app.url'));
printf("timezone=%s\n", config('app.timezone'));
printf(
    "db=%s@%s:%s/%s\n",
    config('database.connections.pgsql.username'),
    config('database.connections.pgsql.host'),
    config('database.connections.pgsql.port'),
    config('database.connections.pgsql.database'),
);
printf("session_domain=%s\n", config('session.domain'));
$stateful = config('sanctum.stateful');
printf("stateful=%s\n", is_array($stateful) ? implode(',', $stateful) : 'N/A');
