<?php

namespace App\Models\ACL;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable=[
        'name',
        'title'
    ];

    public function role()
    {
        return $this->belongsToMany(Permission::class);
    }
}
