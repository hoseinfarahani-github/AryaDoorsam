<?php

namespace App\Http\Controllers\Manager;

use App\Models\Order\Order;
use App\Models\User\Agent;
use App\Models\User\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Morilog\Jalali\Jalalian;

class DashboardController extends ManagerController
{
    public function __construct()
    {
        parent::__construct();
        $this->seo()
            ->setTitle('پنل مدیرعامل آریادرسام')
            ->setDescription('پنل مدیرعامل آریادرسام');
    }

    public function pie_report()
    {

        $new_created_order=Order::whereIn('status',['sent-order-agent','pending-order-CEO'])->count();
        $rejected_order=Order::where('status','reject-order-CEO')->count();
        $confirm_order=Order::whereIn('status',['approved-order-CEO','pending-order-factory' , 'approved-order-factory' , 'bending-order-factory' , 'welding-order-factory','coloring-order-factory', 'packing-order-factory'])->count();

        $status['ایجاد شده']=$new_created_order;
        $status['تایید شده']=$confirm_order;
        $status['لغو شده']=$rejected_order;
        return $status;
    }

    public function revenue_report()
    {
        $month=['0','0','0','0','0','0','0','0','0','0','0','0','0'];
        $order=Order::query()->where('created_at','>',Jalalian::now()->subMonths('5'))
            ->where('created_at','<',Jalalian::now())
            ->get();
        foreach ($order as $od){
            $month[$od->created_at->month]++;
        }
        return array_filter($month);
    }

    public function index()
    {
        $user_order=Order::query()->whereNotIn('status',['create-order-step-1','create-order-step-2','create-order-step-3'])->get();
        $chart=$this->revenue_report();
        $client_count=Client::all()->count();
        $order_count_close=Order::query()->whereIn('status',['sent-order-factory','reject-order-CEO'])->count();
        $order_count_open=Order::whereNotIn('status',['create-order-step-1','create-order-step-2','create-order-step-3','reject-order-CEO','sent-order-factory'])->count();
        $agent_count=Agent::all()->count();
        $chart_pie_report=$this->pie_report();
        return view('Manager.Dashboard.index',[
         'client_count'             => $client_count,
         'order_count_open'         => $order_count_open,
         'order_count_close'        => $order_count_close,
         'user_orders'            => $user_order,
         'chart'                    => json_encode($chart),
         'agent_count'              => $agent_count,
         'chart_pie_report'                    =>json_encode($chart_pie_report)
        ]);
    }
}
