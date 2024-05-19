<?php

namespace App\Http\Controllers\Admin\Ticket;

use App\Http\Controllers\Admin\AdminController;
use App\Models\Ticket\Ticket;
use Illuminate\Http\Request;

class TicketController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->seo()
            ->setTitle('محصولات')
            ->setDescription('پنل مدیریت آریادرسام');
    }

    public function index(Request $request)
    {
        $this->seo()->setTitle('تیکت ها');
        return view('Admin.Ticket.index',[
            'tickets'=>$this->PaginatePagez(Ticket::query(),$request,['title','status','importance'],[]),
        ]);
    }

    public function show(Ticket $ticket)
    {
        $this->seo()->setTitle($ticket->title);
        return view('Admin.Ticket.show',[
            'messages'=>$ticket->message,
            'ticket'=>$ticket
        ]);
    }
}
