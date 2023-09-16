<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Drivers Connection Name
    |--------------------------------------------------------------------------
    */

    'default' => env('DATA_HOOK_DEFAULT_DRIVER', 'http'),

    /*
    |--------------------------------------------------------------------------
    | Drivers Connections
    |--------------------------------------------------------------------------
    |
    | Drivers: "http", "redis"
    |
    */

    'drivers' => [
        'http' => [
            'driver' => 'http',
            'url' => env('DATA_HOOK_HTTP_URL', 'http://localhost:8000/api/data-hook'),
            'timeout' => 5,
            'default_path' =>  env('DATA_HOOK_HTTP_DEFAULT_PATH','sync'),
            'authorization' => env('DATA_HOOK_HTTP_TOKEN'),
        ],
        'redis' => [
            'driver' => 'redis',
            'connection' => 'default',
            'queue' => env('DATA_HOOK_REDIS_QUEUE', 'data-hook'),
            'retry_after' => 90,
            'block_for' => null,
            'after_commit' => false,
        ],

    ],
];
