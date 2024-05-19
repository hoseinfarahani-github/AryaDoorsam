<?php

namespace App\Models\Dictionary;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable=['object'];

    public function metakey()
    {
        return $this->hasOne(Metakey::class);
    }
}
