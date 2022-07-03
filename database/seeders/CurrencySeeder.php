<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Currency;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Currency::truncate();

        $currencies = include(base_path('vendor/torann/currency/resources/currencies.php'));

        foreach ($currencies as $code => $currency) {
            Currency::create([
                'name' => $currency['name'],
                'code' => $code,
                'symbol' => $currency['symbol'],
                'format' => $currency['format'],
                'exchange_rate' => $currency['exchange_rate'],
                'in_use' => false,
                'active' => true,
                'created_at' => '',
                'updated_at' => '',
            ]);
        }

        Currency::where('code', 'IRR')->update([
            'format' => '1,0/00 ريال',
            'exchange_rate' => 1,
            'in_use' => true,
        ]);
    }
}
