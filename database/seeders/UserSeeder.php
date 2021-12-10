<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Rank;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        // Add an Admin
        User::create([
            'rank_id' => Rank::first()->id,
            'product_ids' => [],
            'name' => env('ADMIN_NAME', 'admin'),
            'email' => env('ADMIN_EMAIL', 'admin@admin.com'),
            'email_verified_at' => now(),
            'password' => bcrypt(env('ADMIN_PASSWORD', 'password')),
            'remember_token' => Str::random(10),
        ]);
    }
}
