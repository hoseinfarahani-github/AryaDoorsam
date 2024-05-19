<?php

namespace App\Http\Controllers\Manager\Ticket;

use App\Http\Controllers\Manager\ManagerController;
use App\Models\Order\Order;
use App\Models\Order\OrderDetail;
use App\Models\Ticket\Message;
use App\Models\Ticket\Ticket;
use App\Models\User\Client;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\SMSNotification;


class TicketController extends ManagerController
{
    public function __construct()
    {
        parent::__construct();
        $this->seo()
            ->setTitle('تیکت ها')
            ->setDescription('پنل نمایندگان آریادرسام');
    }

    public function index(Request $request)
    {
        return view('Manager.Ticket.index',[
            'tickets'=>Ticket::query()->where('sender','=',Auth::user()->id)
                ->orWhere('receiver','=',Auth::user()->id)->get()
        ]);
    }

    public function show(Ticket $ticket)
    {
        return view('Manager.Ticket.show',[
            'ticket'    => $ticket,
            'messages'   => $ticket->message

        ]);
    }

    public function create()
    {
        //TODO
        $this->seo()->setTitle('تیکت جدید');
        $users=User::all()->where('username','!=',Auth::user()->username);
        $types=[
            [Order::class,'سفارش ها'],
            [OrderDetail::class,'رکورد سفارش'],
            [Client::class,'مشتری'],
            ['other','سایر']
        ];
        return view('Manager.Ticket.create',[
            'users'=>$users,
            'types'=>$types
        ]);
    }

    public function store(Request $request)
    {
        //TODO Validation


        $ticket=Ticket::create([
            'title'              => $request->ticketTitle,
            'ticketable_id'      => $request->typeIdTicket,
            'ticketable_type'    => $request->typeTicket,
            'sender'             => Auth::user()->id,
            'receiver'           => $request->receiver_id,
            'status'             => 'sent',
            'importance'         => $request->importanceTicket
        ]);

        $message=Message::create([
            'user_id'        => Auth::user()->id,
            'ticket_id'      => $ticket->id,
            'context'        => $request->context
        ]);

        User::query()->find($request->receiver_id)->notify(new SMSNotification($ticket));

        toast('تیکت موردنظر با موفقیت ارسال شد','success');
        return redirect(route('manager.ticket.show',$ticket));
    }

    public function gettype_id(Request $request)
    {
        $type=$request->type;
        if ($type== 'App\Models\User\Client'){

            $array=$type::get(['id'])->toArray();
            $array=array_map(function ($tt){
                $tt['title']=Client::find($tt['id'])->name();
                return $tt;

            },$array);
            $items=$array;

        }
        elseif ($type == 'App\Models\Order\Order'){

            $array=$type::get(['id'])->toArray();
            $array=array_map(function ($tt){
                $tt['title']='سفارش '.Order::find($tt['id'])->client->name();
                return $tt;

            },$array);
            $items=$array;

        }
        elseif ($type == 'App\Models\Order\OrderDetail'){

            $array=$type::get(['id'])->toArray();
            $array=array_map(function ($tt){
                $tt['title']=OrderDetail::find($tt['id'])->product->title
                    . ' '
                    .OrderDetail::find($tt['id'])->width
                    . '*'
                    .OrderDetail::find($tt['id'])->height
                ;
                return $tt;

            },$array);
            $items=$array;
        }elseif($type == 'other'){
            $items='other';

        }else abort(403);

        return response()->json(array('success'=>true,'items'=>$items));

    }

}
