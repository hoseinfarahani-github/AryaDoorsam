<?php

namespace App\Models\Product;

use App\Models\Gallery\Gallery;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=[
        'name',
        'title',
        'short_description',
        'long_description',
        'price',
        'status',
        'sum_rate',
        'count_rate',
        'category_id',
        'available_shop',
        'available_agent'
    ];

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function gallery()
    {
        return $this->belongsToMany(Gallery::class);

    }

    public function brand(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function APV(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(APV::class)->groupBy('attribute_id')->with(['value','attribute']);
    }

    public function getStatusAttribute($status)
    {
        switch ($status) {
            case '1' : return ['English'=>'active','Persian'=>'فعال'];
            case '0' : return ['English'=>'deactive','Persian'=>'غیرفعال'];
            default: return null;
        }


    }
}
