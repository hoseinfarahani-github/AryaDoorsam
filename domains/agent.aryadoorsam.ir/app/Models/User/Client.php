<?php

namespace App\Models\User;

use App\Models\Location\Address;
use App\Models\Order\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable=[
        'clientable_id',
        'clientable_type',
        'agent_id',
        'address_id',
        'status'
    ];

    public function agent(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Agent::class);
    }

    public function address(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Address::class);
    }
    public function clientable(): \Illuminate\Database\Eloquent\Relations\MorphTo
    {
        return $this->morphTo();
    }

    public function name()
    {
        if ($this->clientable_type =='App\Models\User\Client\Personal') return $this->clientable->firstName . ' ' . $this->clientable->lastName;
        elseif ($this->clientable_type =='App\Models\User\Client\Juridical') return $this->clientable->companyName ;
    }

    public function type()
    {
        if ($this->clientable_type =='App\Models\User\Client\Personal') return 'حقیقی';
        elseif ($this->clientable_type =='App\Models\User\Client\Juridical') return 'حقوقی' ;
    }

    public function nationalNumber()
    {
       return $this->clientable->nationalNumber;

    }

    public function phone()
    {
        return $this->clientable->phone;
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function getStatusAttribute($status)
    {
        if ($status == 1) return 'active';
        else return 'deactive';
    }
}
