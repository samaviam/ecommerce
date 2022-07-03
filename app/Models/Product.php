<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $attributes = ['reduction', 'old_price'];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['specificPrice'];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['regular_price'];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'category_id', 'user_ids', 'name', 'slug',
        'cover', 'images', 'quantity', 'regular_price',
        'reference', 'short_description', 'description', 'active',
    ];

    public function getRegularPriceAttribute()
    {
        if (!$this->specificPrice) {
            return $this->attributes['regular_price'];
        }

        $this->attributes['old_price'] = $this->attributes['regular_price'];

        if ($this->specificPrice->reduction_type === 'percentage') {
            $this->attributes['reduction'] = $this->specificPrice->reduction . '%';
            return $this->attributes['regular_price'] * (1 - $this->specificPrice->reduction / 100);
        }

        $this->attributes['reduction'] = \Currency::format($this->specificPrice->reduction, \Currency::getUserCurrency());

        return $this->attributes['regular_price'] - $this->specificPrice->reduction;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, null);
    }

    public function specificPrice()
    {
        return $this->hasOne(SpecificPrice::class)->getValid();
    }

    public function scopeAllActive($query)
    {
        return $this->caching('all-active', function () use ($query) {
            return $query->where('active', true)->get();
        });
    }

    public function scopeBySlug($query, $slug)
    {
        // return $this->caching('slug-' . $slug, function () use ($query, $slug) {
            return $query->where('slug', $slug)->firstOrFail();
        // });
    }

    public function scopePopulars($query)
    {
        return [];
    }

    public function scopeOnSale($query, $currencyId)
    {
        $specificPrice = SpecificPrice::getValid($currencyId);

        return $query->whereIn('_id', $specificPrice->pluck('product_id'));
    }
}
