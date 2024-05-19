<?php

namespace App\Models\ACL;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable=[
        'name',
        'title',
    ];

    public function permission()
    {
        return $this->hasMany(Permission::class);
    }
}
