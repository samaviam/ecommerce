<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Banner::truncate();

        $content = '<div class="wrap-banner style-twin-default"><div class="banner-item"><a href="#" class="link-banner banner-effect-1"><figure><img src="/images/home-1-banner-1.webp" alt="" width="580" height="190"></figure></a></div><div class="banner-item"><a href="#" class="link-banner banner-effect-1"><figure><img src="/images/home-1-banner-2.webp" alt="" width="580" height="190"></figure></a></div></div>';
        Banner::create([
            'title' => 'Top Banner',
            'position' => 1,
            'content' => $content,
            'active' => true,
        ]);
    }
}
