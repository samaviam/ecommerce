<?php

namespace App\Models;

class Banner extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [];

    public function scopeHomepage($query)
    {
        return $this->caching('homepage', function () use ($query) {
            $banners = [];

            $query
                ->whereIn('position', [1, 2, 3])
                ->where('active', true)
                ->get()
                ->map(
                    function ($banner) use (&$banners) {
                        $type = '';
                        switch ($banner->position) {
                            case 1:
                                $type = 'top-homepage';
                                break;
                            case 2:
                                $type = 'middle-homepage';
                                break;
                            case 3:
                                $type = 'bottom-homepage';
                                break;
                        }
                        $banners[$type] = $banner;
                    }
                );

            return $banners;
        });
    }
}
