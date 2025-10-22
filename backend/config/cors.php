<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Allow the React dev server (localhost:3000) to call our Laravel API.
    | Keep supports_credentials=true for Sanctum SPA or cookie flows.
    |
    */

    'paths' => [
        'api/*',
        'sanctum/csrf-cookie',
        'login',
        'logout',
        'user',
    ],

    // Allow all methods for simplicity in dev
    'allowed_methods' => ['*'],

    // Only allow our local front-end origins
    'allowed_origins' => [
        'http://localhost:3000',
        'http://127.0.0.1:3000',
    ],

    'allowed_origins_patterns' => [],

    // Allow common headers; Authorization covers bearer tokens
    'allowed_headers' => ['*'],

    // Not exposing custom headers right now
    'exposed_headers' => [],

    'max_age' => 0,

    // Needed if using cookies with Sanctum; harmless for token auth
    'supports_credentials' => true,
];
