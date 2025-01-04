<?php

namespace App\Providers;

use Inertia\Inertia;

class AppServiceProvider extends Inertia
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
        Inertia::share([
            'appName' => config('app.name'),
        ]);    }
}
