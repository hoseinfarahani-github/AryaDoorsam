<?php

namespace App\Models\User\Client;

use App\Models\User\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;
    protected $fillable=[
        'firstName',
        'lastName',
        'nationalNumber',
        'phone'
    ];

    public function client(): \Illuminate\Database\Eloquent\Relations\MorphOne
    {
        return $this->morphOne(Client::class,'clientable');
    }
}
