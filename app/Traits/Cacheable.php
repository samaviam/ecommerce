<?php

namespace App\Traits;

use Illuminate\Support\Facades\Cache;

trait Cacheable
{
    abstract protected static function getCacheName();

    public static function all($columns = ['*'])
    {
        return self::caching('all', $columns);
    }

    protected function caching($method, ...$parameters)
    {
        return Cache::rememberForever(self::getCacheName(), function () use ($method, $parameters) {
            return parent::{$method}(...$parameters);
        });
    }
}
