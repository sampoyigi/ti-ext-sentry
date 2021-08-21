<?php

$enableTestRoute = config('sentry.enableTestRoute') ?? config('app.debug');
if ($enableTestRoute) {
    Route::get('/debug-sentry', function () {
        throw new Exception('Sentry test exception, check sentry.io to confirm successful report');
    });
}
