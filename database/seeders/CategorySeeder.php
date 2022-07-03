<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            'Fashion & Accessories',
            'Furnitures & Home Decors',
            'Digital & Electronics',
            'Tools & Equipments',
            'Kid’s Toys',
        ];

        Category::truncate();

        Category::factory(count($names))
            ->afterMaking(function ($category) use (&$names) {
                $name = array_pop($names);
                $attributes = ['name' => $name, 'slug' => Str::slug($name)];

                if (!$category->meta_title) {
                    $attributes['meta_title'] = $name;
                }

                $category->fill($attributes)->save();
            })
            ->make();
    }
}
