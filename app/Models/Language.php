<?php

namespace App\Models;

class Language extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name', 'iso_code', 'language_code',
        'date_format_lite', 'date_format_full', 'is_rtl',
    ];
}
