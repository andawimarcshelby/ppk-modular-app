<?php

use App\Http\Middleware\EncryptCookies;
use App\Http\Middleware\VerifyCsrfToken;

return [

    /*
    |--------------------------------------------------------------------------
    | Stateful Domains (for SPA cookie auth)
    |--------------------------------------------------------------------------
    |
    | These hosts may receive stateful API authentication cookies from Sanctum.
    | We include dev hosts/ports used by Docker + Vite.
    |
    */
    'stateful' => explode(',', env('SANCTUM_STATEFUL_DOMAINS', implode(',', [
        'localhost',
        'localhost:3000',
        'localhost:8000',
        '127.0.0.1',
        '127.0.0.1:3000',
        '127.0.0.1:8000',
        'host.docker.internal',
        'host.docker.internal:3000',
    ]))),

    /*
    |--------------------------------------------------------------------------
    | Guards
    |--------------------------------------------------------------------------
    */
    'guard' => ['web'],

    /*
    |--------------------------------------------------------------------------
    | Expiration (minutes)
    |--------------------------------------------------------------------------
    |
    | Null = tokens do not expire (dev-friendly). You can change this later.
    |
    */
    'expiration' => null,

    /*
    |--------------------------------------------------------------------------
    | Token Prefix
    |--------------------------------------------------------------------------
    */
    'token_prefix' => env('SANCTUM_TOKEN_PREFIX', ''),

    /*
    |--------------------------------------------------------------------------
    | Sanctum Middleware
    |--------------------------------------------------------------------------
    */
    'middleware' => [
        'verify_csrf_token' => VerifyCsrfToken::class,
        'encrypt_cookies'   => EncryptCookies::class,
    ],
];
