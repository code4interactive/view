<?php

namespace Code4\ViewElements;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class ViewElementsServiceProvider extends ServiceProvider {

    public function register() {
        $this->app->singleton('viewElements', function($app) {
            return new View();
        });

        $this->registerAliases();
    }

    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../views', 'viewElements');
    }


    private function registerAliases() {
        $aliasLoader = AliasLoader::getInstance();
        $aliasLoader->alias('', Facades\ViewElements::class);
    }

}