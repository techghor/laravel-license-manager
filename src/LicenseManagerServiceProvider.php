<?php

namespace TechGhor\LaravelLicenseManager;

use Illuminate\Support\ServiceProvider;
use TechGhor\LaravelLicenseManager\LicenseManager;
use TechGhor\LaravelLicenseManager\Middleware\CheckLicense;

class LicenseManagerServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config/license.php', 'license');

        $this->app->singleton(LicenseManager::class, function ($app) {
            return new LicenseManager($app['config']['license']);
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/license.php' => config_path('license.php'),
        ], 'license-config');

        $this->loadViewsFrom(__DIR__.'/resources/views', 'license-manager');

        $this->publishes([
            __DIR__.'/resources/views' => resource_path('views/vendor/license-manager'),
        ], 'license-views');

        $this->loadRoutesFrom(__DIR__.'/routes/web.php');

        $this->app['router']->aliasMiddleware('check.license', CheckLicense::class);
    }
}

