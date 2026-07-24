<?php

namespace Sadata\Bootstrap\Providers;

use Illuminate\Support\ServiceProvider;

class SadataBootstrapServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'sadata-bootstrap');

        $this->publishes([
            __DIR__.'/../../resources/views/layouts' => resource_path('views/layouts'),
            __DIR__.'/../../resources/views/auth' => resource_path('views/auth'),
            __DIR__.'/../../resources/views/components' => resource_path('views/components'),
        ], 'sadata-bootstrap-views');

        $this->publishes([
            __DIR__.'/../../config/sadata_ui_bootstrap.php' => config_path('sadata_ui_bootstrap.php'),
        ], 'sadata-bootstrap-config');
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/sadata_ui_bootstrap.php', 'sadata_ui_bootstrap');
    }
}
