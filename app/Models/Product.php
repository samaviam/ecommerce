<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use App\Traits\Cacheable;

class Product extends Model
{
    use HasFactory, cacheable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name', 'slug', 'cover', 'images', 'quantity',
        'regular_price', 'short_description', 'description', 'status',
    ];

    /**
     * @return string
     */
    protected static function getCacheName()
    {
        return 'Product';
    }
}
