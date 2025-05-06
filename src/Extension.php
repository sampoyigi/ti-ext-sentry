<?php

declare(strict_types=1);

namespace SamPoyigi\Sentry;

use Igniter\System\Classes\BaseExtension;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\Event;
use Override;
use Sentry\Laravel\Facade;
use Sentry\Laravel\ServiceProvider;

/**
 * Sentry Extension Information File
 */
class Extension extends BaseExtension
{
    #[Override]
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/sentry.php', 'sentry'
        );

        config()->set('logging.channels.sentry', [
            'driver' => 'sentry',
            'level' => null, // The minimum monolog logging level at which this handler will be triggered
            // For example: `\Monolog\Logger::ERROR`
            'bubble' => true, // Whether the messages that are handled can bubble up the stack or not
        ]);

        $this->app->register(ServiceProvider::class);

        AliasLoader::getInstance()->alias('Sentry', Facade::class);
    }

    #[Override]
    public function boot(): void
    {
        Event::listen('exception.report', function($exception): void {
            if (app()->bound('sentry')) {
                app('sentry')->captureException($exception);
            }
        });
    }
}
