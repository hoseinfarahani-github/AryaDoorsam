<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    protected $fillable=[
        'title'
    ];

    public function staff()
    {
        return $this->hasMany(Staff::class);
    }
}
