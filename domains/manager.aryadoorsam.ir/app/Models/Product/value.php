<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class value extends Model
{
    use HasFactory;
    protected $fillable=[
      'name',
      'title'
    ];

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }
}
