<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use Rawilk\Settings\Facades\Settings;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        if (!App::runningInConsole()) {
            $settings = Settings::all(['app.name', 'app.url', 'app.debug'])
            ->map(fn ($setting) => [$setting->key => $setting->value])
            ->collapse()
            ->toArray();
            config($settings);
        }

    }
}
