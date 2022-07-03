<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name', 'slug', 'description',
        'meta_title', 'meta_description', 'active',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
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
