<?php

return [

    /*
     * Whether or not to enable HTML response caching. Off by default.
     */
    'enable' => env('LARAVEL_CACHE_ENABLE', false),

    /*
     * Length of time to cache the HTML response, in minutes.
     */
    'length' => env('LARAVEL_CACHE_LENGTH', 60),

];
