<?php

namespace App\Models\Calender;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'start',
        'end'
    ];
}
