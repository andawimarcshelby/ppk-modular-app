<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return response('Zenith & Aether API is running', 200)
        ->header('Content-Type', 'text/plain; charset=UTF-8');
});
