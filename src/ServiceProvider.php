<?php

namespace Toyi\ForceHttps;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    const CONFIG_PATH = __DIR__ . '/../config/force-https.php';

    public function boot()
    {
        $this->publishes([
            self::CONFIG_PATH => config_path('force-https.php'),
        ], 'config');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            self::CONFIG_PATH,
            'force-https'
        );
    }
}
