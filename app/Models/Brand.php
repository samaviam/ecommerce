<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Brand extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name', 'slug', 'description', 'short_description',
        'meta_title', 'meta_keywords', 'meta_description', 'active',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['logo'];

    public function getLogoAttribute()
    {
        $path = storage_path('app/images/m/'); // m means manufacturer

        $images = array_map('basename', glob($path . Str::slug($this->attributes['name']) . '.*'));

        return $this->attributes['logo'] = $images ? $images[0] : '';
    }
}
