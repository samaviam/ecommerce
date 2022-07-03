<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
use App\Models\Currency;
use App\Models\Category;
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
        if (!$this->app->runningInConsole() && !isAdminUrl()) {
            View::share([
                'currencies' => Currency::usable()->get(),
                'searchCate' => Category::allActive(),
                'navCate' => Category::show(),
            ]);
        }

        $this->configureBlade();
    }

    private function configureBlade()
    {
        // DIRECTIVE
        Blade::directive('price', function ($price, $code = null) {
            $currency = $code ?? configuration('default_currency');
            if (isAdminUrl()) {
                return '<?php echo currency()->format('. $price . ', \''. $currency . '\'); ?>';
            }

            return '<?php echo currency('. $price . ', \''. $currency . '\', currency()->getUserCurrency()); ?>';
        });

        // COMPONENT
        Blade::component('breadcrumb', Breadcrumb::class);
        Blade::component('table', Table::class);
    }
}
