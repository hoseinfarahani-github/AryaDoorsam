<?php

namespace App\Models\Order;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetail extends Model
{
    use HasFactory;
    //use SoftDeletes;
    protected $fillable=[
        'order_id',
        'product_id',
        'amount',
        'attribute_detail',
        'height',
        'width'

    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function get_attribure()
    {
        return json_decode($this->attribute_detail) ;
    }


}
