<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Tenant\Manager;
use App\Tenant\Observers\TenantObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->singleton(Manager::class, function () {
            return new Manager();
        });

         $this->app->singleton(TenantObserver::class, function () {
            return new TenantObserver(app(Manager::class)->getTenant());
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
