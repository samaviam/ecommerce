<?php

namespace App\Traits;

use Illuminate\Support\Facades\Cache;

trait Cacheable
{
    /**
     * @return string
     */
    abstract protected static function getCacheName();

    /**
     * Find a model by its primary key.
     *
     * @param  mixed  $id
     * @param  array  $columns
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|static[]|static|null
     */
    public static function find($id, $columns = ['*'])
    {
        return (new static)->caching(
            'Find-' . $id . '(' . implode(',', (array) $columns) . ')',
            'find',
            $id, $columns
        );
    }

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
    public static function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null)
    {
        $pageNumber = (int) request()->get($pageName) ?: 1;

        return (new static)->caching(
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
        return (new static)->caching('All-' . implode('.', (array) $columns), 'all', $columns);
    }

    protected function caching($aliases, $method, ...$parameters)
    {
        return Cache::rememberForever(
            static::getCacheName() . ':' . $aliases,
            function () use ($method, $parameters) {
                if (is_callable($method))
                    return $method();

                return parent::{$method}(...$parameters);
            }
        );
    }
}
