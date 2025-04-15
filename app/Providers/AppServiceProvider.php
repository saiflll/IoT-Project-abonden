<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
    // File: app/Providers/RouteServiceProvider.php

public function map()
{
    $this->mapApiRoutes();

    $this->mapWebRoutes();
}

protected function mapApiRoutes()
{
    Route::middleware('api')
         ->namespace($this->namespace)
         ->group(base_path('routes/api.php'));
}

protected function mapWebRoutes()
{
    Route::middleware('web')
         ->namespace($this->namespace)
         ->group(base_path('routes/web.php'));
}

}