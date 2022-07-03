<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Slider;
use Illuminate\Support\Facades\File;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sDir = storage_path('app/images/s/');

        File::cleanDirectory($sDir);
        Slider::truncate();

        $slider = [
            ['name' => 'Smart Watches', 'link' => '/', 'content' => ''],
            ['name' => 'Extra 25% Off', 'link' => '/', 'content' => ''],
            ['name' => 'Great Range of Exclusive Furniture Packages', 'link' => '/', 'content' => ''],
        ];

        $type = random_int(1, 3);
        foreach ($slider as $k => $slide) {
            $slider = Slider::create($slide);

            @mkdir($sDir);

            File::copy(
                public_path('images/slider/main-slider-' . $type . '-' . $k . '.webp'),
                $sDir . $slider->id . '.webp'
            );
        }
    }
}
