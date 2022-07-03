<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        State::truncate();

        State::insert([
            ['name' => 'آذربایجان شرقی', 'active' => true],
            ['name' => 'آذربایجان غربی', 'active' => true],
            ['name' => 'اردبیل', 'active' => true],
            ['name' => 'البرز', 'active' => true],
            ['name' => 'اصفهان', 'active' => true],
            ['name' => 'ایلام', 'active' => true],
            ['name' => 'بوشهر', 'active' => true],
            ['name' => 'تهران', 'active' => true],
            ['name' => 'چهارمحال و بختیاری', 'active' => true],
            ['name' => 'خراسان جنوبی', 'active' => true],
            ['name' => 'خراسان رضوی', 'active' => true],
            ['name' => 'خراسان شمالی', 'active' => true],
            ['name' => 'خوزستان', 'active' => true],
            ['name' => 'زنجان', 'active' => true],
            ['name' => 'سمنان', 'active' => true],
            ['name' => 'سیستان و بلوچستان', 'active' => true],
            ['name' => 'فارس', 'active' => true],
            ['name' => 'قزوین', 'active' => true],
            ['name' => 'قم', 'active' => true],
            ['name' => 'کردستان', 'active' => true],
            ['name' => 'کرمان', 'active' => true],
            ['name' => 'کرمانشاه', 'active' => true],
            ['name' => 'کهگیلویه و بویراحمد', 'active' => true],
            ['name' => 'گلستان', 'active' => true],
            ['name' => 'گیلان', 'active' => true],
            ['name' => 'لرستان', 'active' => true],
            ['name' => 'مازندران', 'active' => true],
            ['name' => 'مرکزی', 'active' => true],
            ['name' => 'هرمزگان', 'active' => true],
            ['name' => 'همدان', 'active' => true],
            ['name' => 'یزد', 'active' => true],
        ]);
    }
}
