<?php

namespace app\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesRepresentative extends Model
{
    use HasFactory;

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function name()
    {
        return $this->firstname . ' ' . $this->lastname;
    }
}
