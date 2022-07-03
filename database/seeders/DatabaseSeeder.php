<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        session()->flush();

        $this->call([
            StateSeeder::class,
            BannerSeeder::class,
            RankSeeder::class,
            UserSeeder::class,
            AddressSeeder::class,
            EmployeeSeeder::class,
            BrandSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            CurrencySeeder::class,
            SliderSeeder::class,
            LanguageSeeder::class,
            ConfigurationSeeder::class,
        ]);
    }
}
