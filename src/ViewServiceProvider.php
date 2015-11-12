<?php

namespace Code4\View;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\NamespacedItemResolver;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider {

    public function register() {
        $this->mergeConfigFrom( __DIR__ . '/../config/c4view.php', 'c4view' );

        //$this->app->singleton('viewElements', function($app) {
        //  return new View();
        //});

        /*$this->app['assetsHelper'] = $this->app->share(function($app) {
            $config = $app['config']->get('c4view');
            $env = $app->environment();
            return new AssetsHelper($config, $env, $app['files'], new NamespacedItemResolver(), $app['url']);
        });*/

        $this->app->bind('assetsHelper', function($app) {
            $config = $app['config']->get('c4view');
            $env = $app->environment();
            return new AssetsHelper($config, $env, $app['files'], new NamespacedItemResolver(), $app['url']);
        });

        $this->app->bind('viewHelper', function($app) {
           return new ViewHelper();
        });

        $this->registerAliases();
    }

    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../views', 'viewElements');
    }


    private function registerAliases() {
        $aliasLoader = AliasLoader::getInstance();
        $aliasLoader->alias('Assets', Facades\AssetsHelper::class);
        $aliasLoader->alias('ViewHelper', Facades\ViewHelper::class);
    }

}