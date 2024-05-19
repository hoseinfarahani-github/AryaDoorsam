<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Calender\Event;
use App\Models\User\User;
use App\Models\User\Client;
use App\Models\Order\OrderDetail;
use App\Models\Order\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends AdminController
{
	    use ChartTrait;

    public function __construct()
    {

        parent::__construct();
        $this->seo()
            ->setTitle('پنل مدیریت آریادرسام')
            ->setDescription('پنل مدیریت آریادرسام');
    }
      public function index(Request $request)
    {
        $newEvent=Event::where('start','>=',now()->format('Y-m-d'))->orderBy('start','asc')->get();
        $newUser=User::query()->latest('created_at')->get()->take(5);
        $newClient=Client::query()->latest('created_at')->get()->take(5);
        $newOrder=Order::query()->latest('created_at')->get()->take(5);
        $newUserCount=User::all()->count();
        $newClientCount=Client::all()->count();
        $newOrderCount=Order::all()->whereNotIn('status', [
            'create-order-step-1',
            'create-order-step-2',
            'create-order-step-3'
                ])->count();
        $newOrderDetailCount=OrderDetail::query()->whereHas('order',function ($query){
           return $query->whereIn('status',[
               'approved-order-CEO',
               'pending-order-factory',
               'approved-order-factory',
               'bending-order-factory',
               'welding-order-factory',
               'coloring-order-factory',
               'packing-order-factory',
           ]);
        })->get()->count();


        return view('Admin.Dashboard.index',[
            'newEvents'=>$newEvent,
            'newUsers'=>$newUser,
            'newOrder'=>$newOrder,
            'newClients'=>$newClient,
            'newUserCount'=>$newUserCount,
            'newClientCount'=>$newClientCount,
            'newOrderCount'=>$newOrderCount,
            'newOrderDetailCount'=>$newOrderDetailCount,
			'report_pie_chart_agent'=> json_encode($this->report_pie_chart_agent(),),
            'report_pie_chart_manager'=> json_encode($this->report_pie_chart_manager()),
            'report_pie_chart_factory'=> json_encode($this->report_pie_chart_factory()),

        ]);
    }

}
