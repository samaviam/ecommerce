<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Address;
use App\Models\State;
use App\Models\User;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Address::truncate();

        $user = User::first()->id;
        $state = State::all()->random()->id;
        Address::factory(2)
            ->afterMaking(function ($address) use ($user, $state) {
                $address->fill(['user_id' => $user, 'state_id' => $state])->save();
            })
            ->make();
    }
}
