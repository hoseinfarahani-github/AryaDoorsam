<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'title'
    ];

    public function value()
    {
        return $this->hasMany(value::class);
    }
}
