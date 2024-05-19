<?php

namespace App\Models\Order;

use App\Models\User\Agent;
use App\Models\User\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Morilog\Jalali\Jalalian;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=[
        'agent_id',
        'client_id',
        'address',
        'status',
        'tracking_serial',
        'sales_representative_id',
        'description',
        'note',
        'production_period',
        'created_at',
        'updated_at'
    ];

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function address()
    {
        //TODO decode json to array or object
    }

    public function order_detail()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function scopeGenerateCode($order){

       /* do{
            $code=mt_rand('1000')
        }while()*/

    }

    private function CheckCodeIsUnique($order,int $code)
    {
        //TODO
        return !! $order->where('tracking_serial',$code);
    }

    public function orederStatus()
    {
        return $this->hasMany(OrderStatus::class);
    }

    public function sales_representative()
    {
        return $this->belongsTo(SalesRepresentative::class);
    }

}
