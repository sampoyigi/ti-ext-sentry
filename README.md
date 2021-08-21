Integrates the [sentry-laravel](https://github.com/getsentry/sentry-laravel) package into TastyIgniter.

### Configuration
If you are using the `.env` file for configuration, simply add your Sentry DSN to the environment file 
as `SENTRY_LARAVEL_DSN` or `SENTRY_DSN`.

After you have provided the DSN, you can go to `example.com/debug-sentry` to test that exceptions are being reported 
to Sentry. Note that by default this route is only enabled when debug mode is enabled, although you can set it to be
explicitly enabled or disabled by changing `SENTRY_ENABLE_TEST_ROUTE` in the `.env` file

### Installation

Clone [the repository](https://github.com/sampoyigi/ti-ext-sentry) into **extensions/sampoyigi/sentry** and 
then run `composer update` from your project root in order to pull in the dependencies.

To install it with Composer, run `composer require sampoyigi/ti-ext-sentry` from your project root.
