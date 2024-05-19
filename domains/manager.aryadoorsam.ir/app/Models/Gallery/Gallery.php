<?php

namespace App\Models\Gallery;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'title',
        'size',
        'attribute',
        'galleria_id',
        'galleria_type',
        'mime',
        'path'
    ];

    public function galleria()
    {
        return $this->morphTo();
    }

    public function Product()
    {
        return $this->belongsToMany(Product::class);
        //MAYBE Edit !
    }


}
