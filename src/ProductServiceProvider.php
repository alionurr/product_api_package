<?php

namespace Product\ProductApi;

use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider
{
    public function register()
    {
        // config dosyasını merge eder 
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'product');
    }

    public function boot()
    {
        // route dosyalarını yükler
        $this->loadRoutesFrom(__DIR__ . '/../routes/api.php');
    }
}