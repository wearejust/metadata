<?php

namespace Just\MetaData\Laravel;

use Illuminate\Support\ServiceProvider;
use Just\MetaData\MetaData;
use Just\MetaData\MetaDataDefaults;
use Just\MetaData\MetaDataWrapper;

class MetaDataServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../../config/metadata.php' => config_path('metadata.php'),
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../../config/metadata.php', 'metadata'
        );

        $this->app->singleton(MetaDataWrapper::class, function () {
            return new MetaDataWrapper(
                new MetaDataDefaults(
                    config('metadata.sitename', ''),
                    config('metadata.description', ''),
                    app('request')->root(),
                    app('request')->fullUrl()
                )
            );
        });

        $this->addViewComposer();
    }

    /**
     *
     */
    private function addViewComposer()
    {
        view()->composer(
            config('metadata.layouts', []), ViewComposer::class
        );
    }
}