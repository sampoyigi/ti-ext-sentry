<?php return [
    // If null, value will be pulled from app.debug
    'enableTestRoute' => env('SENTRY_ENABLE_TEST_ROUTE', null),

    'dsn' => env('SENTRY_LARAVEL_DSN', env('SENTRY_DSN')),

    // capture release as git sha
    // 'release' => trim(exec('git --git-dir ' . base_path('.git') . ' log --pretty="%h" -n1 HEAD')),

    // When left empty or `null` the Laravel environment will be used
    'environment' => env('SENTRY_ENVIRONMENT'),

    'breadcrumbs' => [
        // Capture Laravel logs in breadcrumbs
        'logs' => TRUE,

        // Capture SQL queries in breadcrumbs
        'sql_queries' => TRUE,

        // Capture bindings on SQL queries logged in breadcrumbs
        'sql_bindings' => TRUE,

        // Capture queue job information in breadcrumbs
        'queue_info' => TRUE,

        // Capture command information in breadcrumbs
        'command_info' => TRUE,
    ],

    'tracing' => [
        // Trace queue jobs as their own transactions
        'queue_job_transactions' => env('SENTRY_TRACE_QUEUE_ENABLED', FALSE),

        // Capture queue jobs as spans when executed on the sync driver
        'queue_jobs' => TRUE,

        // Capture SQL queries as spans
        'sql_queries' => TRUE,

        // Try to find out where the SQL query originated from and add it to the query spans
        'sql_origin' => TRUE,

        // Capture views as spans
        'views' => TRUE,

        // Indicates if the tracing integrations supplied by Sentry should be loaded
        'default_integrations' => TRUE,
    ],

    // @see: https://docs.sentry.io/platforms/php/configuration/options/#send-default-pii
    'send_default_pii' => FALSE,

    'traces_sample_rate' => (float)(env('SENTRY_TRACES_SAMPLE_RATE', 0.0)),

    'controllers_base_namespace' => env('SENTRY_CONTROLLERS_BASE_NAMESPACE', 'App\\Http\\Controllers'),
];
