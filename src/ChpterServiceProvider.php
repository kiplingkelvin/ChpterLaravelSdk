<?php

namespace KiplingKelvin\ChpterLaravelSdk;

use Illuminate\Support\ServiceProvider;
use KiplingKelvin\ChpterPhpSdk\Console\InstallChpter;

class ChpterServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //

        // require __DIR__.'/routes/web.php';
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');

        if ($this->app->runningInConsole()) {
            //publish the config files
            $this->publishes([
              __DIR__.'/../config/chpter.php' => config_path('chpter.php'),
          ], 'chpter-config');

            // Register commands
            $this->commands([
            InstallChpter::class,
          ]);
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->singleton(Chpter::class, function () {
            return new Chpter();
        });
    }
}
