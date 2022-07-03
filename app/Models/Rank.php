<?php

namespace App\Models;

class Rank extends Model
{
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
