<?php

namespace CSSJockey\LaravelSvg;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\ServiceProvider;

class LaravelSvgServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     */
    public function boot(): void
    {
        if (env('CJ_DEV', false)) {
            Artisan::call('optimize:clear');
        }

        $this->bootDirectives();

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    public function bootDirectives()
    {
        $filesystem = new Filesystem();
        $directives_dir_path = __DIR__.'/../directives/';
        $dirs = $filesystem->files($directives_dir_path, false);
        foreach ($dirs as $dir) {
            require $dir->getPathname();
        }
    }

    /**
     * Register any package services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laravel-svg.php', 'laravel-svg');

        // Register the service the package provides.
        $this->app->singleton('laravel-svg', function ($app) {
            return new LaravelSvg();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['laravel-svg'];
    }

    /**
     * Console-specific booting.
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/laravel-svg.php' => config_path('laravel-svg.php'),
        ], 'laravel-svg.config');

        // Registering package commands.
        // $this->commands([]);
    }
}
