<?php

namespace App\Providers;

use App\Repositories\Contracts\ArticlesInterface;
use App\Repositories\Contracts\PracticeInterface;
use App\Repositories\Eloquent\ArticlesRepository;
use App\Repositories\Eloquent\PracticeRepository;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Laravel\Dusk\DuskServiceProvider;

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
        if ($this->app->environment('local', 'testing')) {
            $this->app->register(DuskServiceProvider::class);
        }
        if (\Request::is('api/*')) {
            $this->app->singleton(ArticlesInterface::class,ArticlesRepository::class);
        }
        $this->app->singleton(PracticeInterface::class,PracticeRepository::class);
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
}
