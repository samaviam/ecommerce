<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SpecificPrice extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'currency_id', 'user_id', 'product_id', 'from', 'to',
        'start_from', 'reduction', 'reduction_type', 'active',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @deprecated Use the "casts" property
     *
     * @var array
     */
    protected $dates = ['from', 'to'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getProductNameAttribute()
    {
        return Product::find($this->product_id)->name;
    }

    public function getUserNameAttribute()
    {
        if ($this->user_id) {
            return User::find($this->user_id)->name;
        }
    }

    public function getCurrencyCodeAttribute()
    {
        return Currency::find($this->reduction_type)->code;
    }

    // public function setFromAttribute($value)
    // {
    //     $this->attributes['from'] = Carbon::createFromFormat('m/d/Y', $value)->toDateString();
    // }

    // public function getFromAttribute()
    // {
    //     return $this->attributes['from'];
    // }

    // public function setToAttribute($value)
    // {
    //     $this->attributes['to'] = Carbon::createFromFormat('m/d/Y', $value)->toDateString();
    // }

    // public function getToAttribute()
    // {
    //     return $this->attributes['to'];
    // }

    public function scopeGetValid($query, $currencyId = null)
    {
        $now = now();
        $userId = auth()->id();

        if (is_null($currencyId))
            $currencyId = Currency::getDefault()['id'];

        $query->whereIn('reduction_type', ['percentage', $currencyId]);

        $userId ? $query->whereIn('user_id', [null, $userId]) : $query->whereNull('user_id');

        return $query->whereDate('from', '<=', $now)
            ->whereDate('to', '>=', $now)
            ->where('active', true);
    }
}
