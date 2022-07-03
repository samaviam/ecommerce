<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BrandSeeder extends Seeder
{
    public $times = 0;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mDir = storage_path('app/images/m/');

        File::cleanDirectory($mDir);
        Brand::truncate();

        $names = ['audiojungle', 'codecanyon', 'graphicriver', 'photodune', 'themeforest'];
        $images = glob(public_path('images/brands/') . '*.webp');

        Brand::factory(5)
            ->afterMaking(function ($brand) use ($mDir, $names, $images) {
                $name = $names[$this->times];
                $slug = Str::slug($name);
                $image = $images[$this->times];

                File::copy($image, $mDir . $name . '.' . pathinfo($image, PATHINFO_EXTENSION));

                $brand->fill(compact('name', 'slug'))->save();
                $this->times++;
            })
            ->make();
    }
}
