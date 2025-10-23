<?php

use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Commands
|--------------------------------------------------------------------------
| You can define closure-based Artisan commands here.
*/

Artisan::command('hello', function () {
    $this->info('Hello from Zenith & Aether CLI!');
})->purpose('Print a hello message');
