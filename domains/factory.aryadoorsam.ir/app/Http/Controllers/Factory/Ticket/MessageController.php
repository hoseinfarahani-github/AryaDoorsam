<?php

namespace App\Http\Controllers\Factory\Ticket;

use App\Http\Controllers\Factory\FactoryController;
use App\Models\Ticket\Message;
use App\Models\Ticket\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends FactoryController
{
    public function send(Ticket $ticket,Request $request)
    {
        //TODO Validation
        Message::create([
            'user_id'       => Auth::user()->id,
            'ticket_id'     => $ticket->id,
            'context'       => $request->context,
        ]);
        //inja bayad edit she
        $ticket->update([
           'status'=>'sent'
        ]);
        toast('پیام موردنظر با موفقیت ارسال شد','success');
        return back();
    }
}
