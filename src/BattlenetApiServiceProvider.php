<?php

namespace Xklusive\BattlenetApi;

use Illuminate\Support\ServiceProvider;
use Xklusive\BattlenetApi\Services\WowService;

class BattlenetApiServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $configPath = __DIR__.'/../resources/config/battlenet-api.php';
        if (function_exists('config_path')) {
            $publishPath = config_path('battlenet-api.php');
        } else {
            $publishPath = base_path('config/battlenet-api.php');
        }

        $this->publishes([$configPath => $publishPath], 'config');
        $this->mergeConfigFrom($configPath, 'battlenet-api');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('WowService', WowService::class);
    }
}
