<?php namespace SamPoyigi\Sentry;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\Event;
use System\Classes\BaseExtension;

/**
 * Sentry Extension Information File
 */
class Extension extends BaseExtension
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/sentry.php', 'sentry'
        );

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
