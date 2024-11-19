<?php

namespace App\Providers;

use App\Models\Config;
use App\Models\SgoContact;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        $contactWebsite = SgoContact::first();
        $configWebsite = Config::first();
        View::composer('*', function ($view) use ($contactWebsite, $configWebsite) {
            $view->with([
                'contactWebsite' => $contactWebsite,
                'configWebsite' => $configWebsite
            ]);
        });
    }
}
