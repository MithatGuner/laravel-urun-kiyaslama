<?php
namespace MithatGuner\Kiyasla\Providers;

use Illuminate\Support\ServiceProvider;
use MithatGuner\Kiyasla\Kiyasla;

class KiyaslaServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->publishConfiguration();
        $this->publishMigrations();
    }
    public function register()
    {
        $config = __DIR__ . '/../../config/kiyasla.php';
        $this->mergeConfigFrom($config, 'kiyasla');
        $this->app->singleton('kiyasla', Kiyasla::class);
    }
    public function provides()
    {
        return ['kiyasla'];
    }
    public function publishConfiguration()
    {
        $path   =   realpath(__DIR__.'/../../config/kiyasla.php');
        $this->publishes([$path => config_path('kiyasla.php')], 'config');
    }
    public function publishMigrations()
    {
        $this->publishes([
            __DIR__.'/../../database/migrations/' => database_path('/migrations')
        ], 'migrations');
    }
}