<?php

namespace App\Models;

use Illuminate\Support\Str;

class Configuration extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['name', 'value'];

    public function scopeGetConfig($query, $key, $default)
    {
        if (is_null($key)) {
            return $this->caching('pluck-all', function () {
                return Configuration::pluck('value', 'name')->toArray();
            });
        }

        return $this->caching('get-' . $key, function () use ($key, $default) {
            $value = Configuration::select('value')
                                    ->where('name', Str::upper($key))
                                    ->value('value');

            return $value ?: $default;
        });
    }
}
