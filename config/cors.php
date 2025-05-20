<?php

return [
    'paths' => ['*'],
    'allowed_methods' => ['*'],
    'allowed_origins' => [
        'https://ingame1.azeme.uz', 
        'http://localhost:5173',
        'https://jamshidpts-ingame.vercel.app',
        'https://ingamehub.vercel.app'
    ],
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'],
    'exposed_headers' => [],
    'max_age' => 3600,
    'supports_credentials' => true,    
];
