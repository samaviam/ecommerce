<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use App\Traits\Cacheable;

class Category extends Model
{
    use HasFactory, cacheable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name', 'slug', 'description',
        'meta_title', 'meta_description', 'active',
    ];

    /**
     * @return string
     */
    protected static function getCacheName()
    {
        return 'Category';
    }

    public function scopeBySlug($query, $slug)
    {
        return $this->caching('slug-' . $slug, function () use ($query, $slug) {
            return $query->where('slug', $slug)->firstOrFail();
        });
    }

    public function scopeShow($query)
    {
        return $this->caching('show', function () use ($query) {
            return $query->where([
                ['show', true],
                ['active', true],
            ])->get();
        });
    }
}
