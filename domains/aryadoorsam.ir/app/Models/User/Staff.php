<?php

namespace App\Models\User;

use App\Models\Gallery\Gallery;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected $table='staffs';

    protected $fillable=[
        'firstname',
        'lastname',
        'personal_code',
        'gallery_id',
        'position_id',
    ];

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }

    public function name()
    {
        return $this->firstname . ' ' . $this->lastname;
    }
}
