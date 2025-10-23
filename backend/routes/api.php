<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| These routes are automatically loaded into the 'api' middleware group
| via bootstrap/app.php -> withRouting(...).
*/

Route::get('/validate', function () {
    return response()->json([
        'status' => 'ok',
        'time'   => now()->toISOString(),
    ]);
});
