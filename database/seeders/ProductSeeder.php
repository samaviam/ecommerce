<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\File;

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
        $categories = Category::pluck('_id');
        $pDir = storage_path('app/images/p/');

        File::cleanDirectory($pDir);
        Product::truncate();

        Product::factory(5)
            ->afterCreating(function ($product) use ($categories, $pDir) {
                $id = $product->id;
                $pDir .= $id . '/';
                $images = [];
                $i = $this->times * 4 + 1;

                mkdir($pDir);

                foreach (range($i, ($i + 3)) as $n) {
                    $img = 'digital_' . ($n <= 9 ? '0' . $n : $n) . '.webp';

                    if ($i == $n) {
                        $images['cover'] = $img;
                    } else {
                        $images['images'][] = $img;
                    }

                    File::copy(
                        public_path('images/products/' . $img),
                        $pDir . $img
                    );
                }

                $product->fill(array_merge(['category_id' => $categories->random()], $images))->save();

                $this->times++;
            })
            ->create();
    }
}
