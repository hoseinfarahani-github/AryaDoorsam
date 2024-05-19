<?php

namespace App\Models\Sitemap;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hashtag extends Model
{
    use HasFactory;
    protected $fillable=[
        'hashtaglia_id',
        'hashtaglia_type',
        'title'
    ];
}
