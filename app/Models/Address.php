<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Address extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id', 'state_id', 'name', 'firstname', 'lastname', 'company', 'address1',
        'address2', 'postcode', 'city', 'phone', 'phone_mobile', 'active', 'deleted',
    ];

    public function getUserAttribute()
    {
        return User::find($this->user_id)->name;
    }
}
