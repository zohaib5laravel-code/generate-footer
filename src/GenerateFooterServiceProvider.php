<?php

namespace Zohaib\GenerateFooter;

use Illuminate\Support\ServiceProvider;
use Zohaib\GenerateFooter\Commands\InstallFooterCommand;
use Zohaib\GenerateFooter\Commands\RemoveFooterCommand;

class GenerateFooterServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Load views
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'generate-footer');

        // Publish views
        $this->publishes([
            __DIR__ . '/resources/views' => resource_path('views/vendor/generate-footer'),
        ], 'footer-view');

        // Publish assets
        $this->publishes([
            __DIR__ . '/resources/css' => public_path('vendor/generate-footer/css'),
            __DIR__ . '/resources/js' => public_path('vendor/generate-footer/js'),
        ], 'footer-assets');

        // Register console commands
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallFooterCommand::class,
                RemoveFooterCommand::class,
            ]);
        }
    }

    public function register()
    {
        //
    }
}
