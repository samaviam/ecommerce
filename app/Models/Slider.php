<?php

namespace App\Models;

use Illuminate\Support\Facades\File;

class Slider extends Model
{
    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['image'];

    public function getImageAttribute()
    {
        $images = File::files(storage_path('app/images/s'));

        foreach ($images as $image) {
            $filename = $image->getFilename();

            if (strpos($filename, $this->id) === 0)
                return $filename;
        }
    }
}
