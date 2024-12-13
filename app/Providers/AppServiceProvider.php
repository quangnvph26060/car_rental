<?php

namespace App\Providers;

use App\Models\Config;
use App\Models\SgoContact;
use App\Models\Type;
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
        $typeCarWebsite = Type::select('id', 'name', 'slug')->get();
        View::composer('*', function ($view) use ($contactWebsite, $configWebsite, $typeCarWebsite) {
            $view->with([
                'contactWebsite' => $contactWebsite,
                'configWebsite' => $configWebsite,
                'typeCarWebsite' => $typeCarWebsite
            ]);
        });
    }
}
