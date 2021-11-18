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
        'name', 'slug', 'cover', 'images', 'quantity', 'regular_price',
        'reference', 'short_description', 'description', 'status',
    ];

    /**
     * @return string
     */
    protected static function getCacheName()
    {
        return 'Product';
    }

    public function scopeAllActive($query)
    {
        return $this->caching('all-active', function () use ($query) {
            return $query->where('active', true)->get();
        });
    }

    public function scopeBySlug($query, $slug)
    {
        return $this->caching('slug-' . $slug, function () use ($query, $slug) {
            return $query->where('slug', $slug)->firstOrFail();
        });
    }

    public function scopePopulars($query)
    {
        return [];
    }
}
