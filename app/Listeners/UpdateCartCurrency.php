<?php

namespace App\Listeners;

use App\Events\CurrencyChanged;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateCartCurrency
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\CurrencyChanged  $event
     * @return void
     */
    public function handle(CurrencyChanged $event)
    {
        $carts = \Cart::getContent();

        if ($carts->isEmpty()) {
            return false;
        }

        Debugbar::info([$event->oldCurrency, $event->newCurrency]);

        $carts->each(function ($cart) use ($event) {
            \Cart::update($cart->id, [
                'price' => currency($cart->price, $event->oldCurrency, $event->newCurrency, false),
            ]);
        });
    }
}
