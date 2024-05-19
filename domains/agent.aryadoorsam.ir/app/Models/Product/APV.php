<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class APV extends Model
{
    use HasFactory;
    protected $table='attribute_product_value';
    protected $fillable=[
        'attribute_id',
        'product_id',
        'value_id',
        'available_shop',
        'available_agent'
    ];

    public function attribute(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Attribute::class);
    }

    public function product(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function value()
    {
        return $this->belongsTo(value::class);
    }
}
