<?php

namespace App\Models\User;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\ACL\Permission;
use App\Models\Gallery\Gallery;
use App\Models\Location\Address;
use App\Models\Order\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'sex',
        'agent_id',
        'gallery_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function is_superUser()
    {
        return $this->super;
    }

    public function is_staffUser()
    {
        return $this->staff;
    }

    public function is_agentUser()
    {

        if($this->agent_id != 0 || $this->agent_id != null)
            return true;
        else
            return false;
    }

    public function hasPermission($permission)
    {
        return $this->permissions->contains('name',$permission->name);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }

    public function address(): \Illuminate\Database\Eloquent\Relations\MorphOne
    {
        return $this->morphOne(Address::class,'addressable');
    }

    public function order(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Order::class,'agent_id');
    }

    public function client(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Client::class,'agent_id');
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }
}
