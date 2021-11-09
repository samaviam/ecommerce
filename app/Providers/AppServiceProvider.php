<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use App\View\Components\Breadcrumb;
use App\View\Components\Table;

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
        $this->registerComponents();
    }

    private function registerComponents()
    {
        Blade::component('breadcrumb', Breadcrumb::class);
        Blade::component('table', Table::class);
    }
}
