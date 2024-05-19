<?php

namespace App\Models\Location;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
    ];

    public function county(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(County::class);
    }

    public function address(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Address::class);
    }
}
