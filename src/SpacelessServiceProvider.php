<?php

namespace mindtwo\Spaceless;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class SpacelessServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/spaceless.php' => config_path('spaceless.php'),
            ], 'config');
        }

        $this->registerBladeDirectives();
    }

    /**
     * Register any package services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/spaceless.php', 'spaceless');

        $this->app->singleton(BladeDirectives::class);
    }

    /**
     * Register the @spaceless and @endspaceless Blade directives.
     */
    protected function registerBladeDirectives(): void
    {
        Blade::directive('spaceless', function (): string {
            return "<?php app('".BladeDirectives::class."')->spaceless(); ?>";
        });

        Blade::directive('endspaceless', function (): string {
            return "<?php echo app('".BladeDirectives::class."')->endSpaceless(); ?>";
        });
    }
}
