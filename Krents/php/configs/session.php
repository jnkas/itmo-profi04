<?php
return [
    /*
     * Type may be "redis" or "files"
     */
    'type'  => env('SESSION_STORAGE', 'files'),
    'path'  => env('SESSION_SAVE_PATH', APP_PATH.'/storage/sessions/'),
    /*
     * Redis server connection settings
     */
    'redis' => [
        'host'     => env('REDIS_HOST', '127.0.0.1'),
        'port'     => env('REDIS_PORT', '6379'),
        'password' => env('REDIS_PASS', null),
    ],

];