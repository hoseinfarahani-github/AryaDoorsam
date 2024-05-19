<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable=[
        'order_id',
        'status'
    ];
    protected $table='order_status_log';

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
