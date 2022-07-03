<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::truncate();
        
        $languages = [
            [
                'name' => 'English',
                'iso_code' => 'en',
                'language_code' => 'en-US',
                'date_format_lite' => 'm/d/Y',
                'date_format_full' => 'm/d/Y H:i:s',
                'is_rtl' => false,
            ],
            [
                'name' => 'فارسی',
                'iso_code' => 'fa',
                'language_code' => 'fa-IR',
                'date_format_lite' => 'Y/m/d',
                'date_format_full' => 'Y/m/d H:i:s',
                'is_rtl' => true,
            ]
        ];
        foreach ($languages as $language) {
            Language::create($language);
        }
    }
}
