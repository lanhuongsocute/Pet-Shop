
<?php

use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Session\Middleware\StartSession;

return [
    'web' => [
        StartSession::class,
        VerifyCsrfToken::class,
        SubstituteBindings::class,
    ],

    'api' => [
        \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
        'throttle:api',
        \Illuminate\Routing\Middleware\SubstituteBindings::class,
    ],
];
