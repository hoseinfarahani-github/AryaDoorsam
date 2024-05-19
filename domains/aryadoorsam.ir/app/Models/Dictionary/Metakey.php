<?php

namespace App\Models\Dictionary;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Metakey extends Model
{
    use HasFactory;
    protected $fillable=[
        'key',
        'setting_id'
    ];

    public function setting()
    {
        return $this->belongsTo(Setting::class);
    }
}
