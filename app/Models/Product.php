<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use App\Traits\Cacheable;

class Product extends Model
{
    use HasFactory, cacheable;

    protected static function getCacheName()
    {
        return 'Product';
    }
}
