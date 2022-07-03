<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::truncate();

        Employee::create([
            'firstname' => env('ADMIN_FIRSTNAME', 'firstname'),
            'lastname' => env('ADMIN_LASTNAME', 'lastname'),
            'email' => env('ADMIN_EMAIL', 'admin@admin.com'),
            'password' => bcrypt(env('ADMIN_PASSWORD', 'password')),
        ]);
    }
}
