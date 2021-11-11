<?php

namespace App\Traits;

use Illuminate\Support\Facades\Cache;

trait Cacheable
{
    abstract protected static function getCacheName();

    /**
     * Paginate the given query.
     *
     * @param  int|null  $perPage
     * @param  array  $columns
     * @param  string  $pageName
     * @param  int|null  $page
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     *
     * @throws \InvalidArgumentException
     */
    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null)
    {
        $pageNumber = (int) request()->get($pageName) ?: 1;

        return self::caching(
            'Paginate-' . $perPage . $pageName . $pageNumber . $page,
            'paginate',
            $perPage, $columns, $pageName, $page
        );
    }

    /**
     * Get all of the models from the database.
     *
     * @param  array|mixed  $columns
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function all($columns = ['*'])
    {
        return self::caching('All-' . implode('.', (array) $columns), 'all', $columns);
    }

    protected function caching($aliases, $method, ...$parameters)
    {
        return Cache::rememberForever(
            self::getCacheName() . ':' . $aliases,
            function () use ($method, $parameters) {
                return parent::{$method}(...$parameters);
            }
        );
    }
}
