<?php

namespace App\Models\Product;

use App\Models\Gallery\Gallery;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['name','title','abstract','description','gallery_id'];

    public function product(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function gallery(): \Illuminate\Database\Eloquent\Relations\MorphOne
    {
        return $this->morphOne(Gallery::class,'galleria');
    }
}
