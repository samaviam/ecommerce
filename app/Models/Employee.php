<?php

namespace App\Models;

use Jenssegers\Mongodb\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\Cacheable;

class Employee extends Authenticatable
{
    use HasApiTokens, Cacheable, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['firstname', 'lastname', 'email', 'password'];

    /**
     * @return string
     */
    protected static function getCacheName()
    {
        return 'Employee';
    }
}
