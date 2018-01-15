<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Tmdb\HttpClient\Plugin\LanguageFilterPlugin;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $plugin = new LanguageFilterPlugin('en-US');
        $client = $this->app->make('Tmdb\Client');
        $client->getHttpClient()->addSubscriber($plugin);
    }
}
