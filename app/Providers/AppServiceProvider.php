<?php

namespace App\Providers;

use App\View\Composers\DepartmentComposer;
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
        View::composer(['components.header-component', 'components.footer-component'], DepartmentComposer::class);
    }
}
