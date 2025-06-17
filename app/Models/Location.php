<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Location extends Model
{
    use HasFactory;

    public function doctors(): HasMany
    {
        return $this->hasMany(Doctor::class);
    }

    public function user(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
