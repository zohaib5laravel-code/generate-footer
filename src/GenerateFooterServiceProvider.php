<?php

namespace Zohaib\GenerateFooter;

use Illuminate\Support\ServiceProvider;
use Zohaib\GenerateFooter\Commands\InstallFooterCommand;

class GenerateFooterServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/footer.php' => config_path('footer.php'),
        ], 'footer-config');

        $this->publishes([
            __DIR__.'/../resources/views/footer.blade.php'
                => resource_path('views/layouts/footer.blade.php'),
        ], 'footer-view');

        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallFooterCommand::class,
            ]);
        }
    }
}
