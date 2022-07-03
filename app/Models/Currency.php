<?php

namespace App\Models;

class Currency extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name', 'code', 'symbol', 'format',
        'exchange_rate', 'in_use', 'active',
    ];

    public function scopeUsable()
    {
        return $this->where(['in_use' => true, 'active' => true]);
    }

    public function scopeGetDefault()
    {
        return $this->where('code', currency()->getUserCurrency())->first();
    }
}
