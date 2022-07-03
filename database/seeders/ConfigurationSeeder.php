<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Configuration;
use App\Models\Currency;

class ConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Configuration::truncate();

        $configurations = [
            'default_currency' => Currency::where('in_use', true)->first()->code,
        ];

        foreach ($configurations as $name => $value) {
            Configuration::create(['name' => Str::upper($name), 'value' => $value]);
        }
    }
}
