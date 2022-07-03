<?php

namespace App\Listeners;

use App\Events\Localization;
use App\Models\Currency;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Product;

class ConvertProductPrice
{
    /**
     * @var string
     */
    private $defCurrency;

    /**
     * @var string
     */
    private $currency;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        $this->defCurrency = configuration('default_currency');
        $this->currency = request('default_currency');
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\Localization  $event
     * @return void
     */
    public function handle(Localization $event)
    {
        if (
            !request('auto_convert_price') ||
            $this->currency === $this->defCurrency
        ) {
            return false;
        }

        $this->changeRates();

        Product::all()->each(function ($product) {
            $product->regular_price = currency($product->regular_price, $this->defCurrency, $this->currency, false);
            $product->save();
        });
    }
    
    private function changeRates()
    {
        $currency = Currency::where('code', $this->currency)->first();
        Currency::where('code', $this->defCurrency)->update(['exchange_rate' => (1 / $currency->exchange_rate)]);
        $currency->update(['exchange_rate' => 1]);

        Currency::usable()->whereNotIn('code', [$this->currency, $this->defCurrency])->get()->each(function ($item) {
            $item->exchange_rate = 1 / $item->exchange_rate;
            $item->save();
        });
    }
}
