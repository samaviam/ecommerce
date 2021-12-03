<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use File;

class ProductSeeder extends Seeder
{
    public $times = 0;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::all('id');

        Product::truncate();

        Product::factory()
            ->count(5)
            ->afterCreating(function ($product) use($categories) {
                $id = $product->id;
                $pDir = 'app/images/p/' . $id;
                $images = [];
                $i = $this->times * 4 + 1;

                mkdir(storage_path($pDir));

                foreach (range($i, ($i + 3)) as $n) {
                    $img = 'digital_' . ($n <= 9 ? '0' . $n : $n) . '.webp';

                    if ($i == $n) {
                        $images['cover'] = $img;
                    } else {
                        $images['images'][] = $img;
                    }

                    File::copy(
                        public_path('images/products/' . $img),
                        storage_path($pDir . '/' . $img)
                    );
                }

                $product->fill(array_merge(['category_id' => $categories->random()->id], $images))->save();

                $this->times++;
            })
            ->create();
    }
}
