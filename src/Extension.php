<?php namespace SamPoyigi\Sentry;

use Igniter\System\Classes\BaseExtension;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\Event;

/**
 * Sentry Extension Information File
 */
class Extension extends BaseExtension
{
    public function register()
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

        $this->app->register(\Sentry\Laravel\ServiceProvider::class);

        AliasLoader::getInstance()->alias('Sentry', \Sentry\Laravel\Facade::class);
    }

    public function boot()
    {
        Event::listen('exception.report', function ($exception) {
            if (app()->bound('sentry')) {
                app('sentry')->captureException($exception);
            }
        });
    }
}
