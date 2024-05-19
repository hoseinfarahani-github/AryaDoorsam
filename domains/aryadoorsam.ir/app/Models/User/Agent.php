<?php

namespace App\Models\User;

use App\Models\Location\Address;
use App\Models\Order\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;
    protected $fillable=[
        'code',
        'address_id',
    ];

    public function address(): \Illuminate\Database\Eloquent\Relations\MorphOne
    {
        return $this->morphOne(Address::class,'addressable');
    }

    public function client(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Client::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

}
