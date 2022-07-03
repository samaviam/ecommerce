<?php

namespace App\Models;

use App\Observers\ModelObserver;
use Jenssegers\Mongodb\Eloquent\Model as BaseModel;
use App\Traits\Cacheable;
use RuntimeException;

class Model extends BaseModel
{
    use Cacheable;

    /**
     * Bootstrap the model and its traits.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::observe(ModelObserver::class);
    }

    /**
     * @return string
     */
    protected static function getCacheName()
    {
        return ltrim(static::class, 'App\\Models\\');
    }

    public function scopeAllActive($query)
    {
        return $this->caching('all-active', function () use ($query) {
            return $query->where('active', true)->get();
        });
    }
}
