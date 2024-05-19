<?php

namespace App\Models\Ticket;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'ticketable_id',
		'receiver',
		'sender',
        'ticketable_type',
        'user_id',
        'type',
        'status',
        'importance'
    ];

    public function message(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Message::class);
    }

    public function lastMessage()
    {
        return $this->message()->latest()->first();
    }

    public function ticketable()
    {
        return $this->morphTo();
    }

    public function sender_user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {

        return $this->belongsTo(User::class,'sender','id');
    }

    public function receiver_user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class,'receiver','id');
    }

    public function getTypeAttribute($type)
    {
        switch ($type){
            case 'order'        :     return ['fa'=>'سفارش','eng'=>'order'];
            case 'order_detail' :     return ['fa'=>'جزئیات سفارش','eng'=>'order_detail'];

        }
    }

    public function getStatusAttribute($status):array
    {
        switch ($status){
            case 'sent'     : return [ 'fa' => 'ارسال شده'          , 'eng'=> 'sent'     , 'theme' => 'theme-12' ];
            case 'pending'  : return [ 'fa' => 'در حالت پاسخ گویی'  , 'eng'=> 'pending'  , 'theme' => 'theme-7' ];
            case 'answered' : return [ 'fa' => 'پاسخ داده شده'      , 'eng'=> 'answered' , 'theme' => 'theme-42' ];
            case 'closed'   : return [ 'fa' => 'بسته شده'           , 'eng'=> 'closed'   , 'theme' => 'theme-6'  ];
        }
    }

    public function getImportanceAttribute($importance):array
    {
        switch ($importance){
            case '1'    : return ['fa'=>'کم','num'=>'1'];
            case '2'    : return ['fa'=>'متوسط','num'=>'2'];
            case '3'    : return ['fa'=>'زیاد','num'=>'3'];
            case '4'    : return ['fa'=>'خیلی زیاد','num'=>'4'];
        }
    }
}
