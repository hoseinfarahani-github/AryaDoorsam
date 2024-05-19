<?php

namespace App\Models\Location;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'province_id',
        'distance',
        'distance_time'
    ];

    public function province(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
      return  $this->belongsTo(Province::class);
    }

    public function address(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Address::class);
    }
}
