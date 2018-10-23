<?php

namespace mindtwo\Spaceless;

use Blade;
use Illuminate\Support\ServiceProvider;

class SpacelessServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/spaceless.php' => config_path('spaceless.php'),
            ], 'config');
        }

        $this->applyBladeDirectives();
    }

    /**
     * Register any application services
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/spaceless.php', 'spaceless');
        $this->app->singleton(BladeDirectives::class);
    }

    public function applyBladeDirectives()
    {
        Blade::directive('spaceless', function () {
            return "<?php app('mindtwo\Spaceless\BladeDirectives')->spaceless() ?>";
        });

        Blade::directive('endspaceless', function () {
            return "<?php echo app('mindtwo\Spaceless\BladeDirectives')->endSpaceless() ?>";
        });
    }
}
