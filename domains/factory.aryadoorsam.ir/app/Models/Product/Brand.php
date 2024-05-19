<?php

namespace App\Models\Product;

use App\Models\Gallery\Gallery;
use App\Models\Location\Country;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'title',
        'description',
        'country_id',
        'gallery_id'
    ];

    public function gallery(): \Illuminate\Database\Eloquent\Relations\MorphOne
    {
        return $this->morphOne(Gallery::class,'galleria');
    }

    public function country(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
     return $this->belongsTo(Country::class);
    }
}
