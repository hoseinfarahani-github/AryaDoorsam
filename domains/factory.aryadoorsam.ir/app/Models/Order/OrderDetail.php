<?php

namespace App\Models\Order;

use App\Models\Product\Product;
use App\Models\Ticket\Ticket;
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
        'width',
        'description',
        'tracking_serial',
        'support_serial',


    ];



    public function order(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function product(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function get_attribute()
    {
        return json_decode($this->attribute_detail) ;
    }

    public function ticket(): \Illuminate\Database\Eloquent\Relations\MorphToMany
    {
        return $this->morphToMany(Ticket::class,'ticketable');
    }

}
