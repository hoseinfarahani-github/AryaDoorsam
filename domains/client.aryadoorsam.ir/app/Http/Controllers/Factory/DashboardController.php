<?php

namespace App\Http\Controllers\Factory;

use App\Models\Order\Order;
use Illuminate\Http\Request;

class DashboardController extends FactoryController
{

    public function __construct()
    {
        parent::__construct();
        $this->seo()
            ->setTitle('پنل کارخانه آریادرسام')
            ->setDescription('پنل کارخانه آریادرسام');

    }

    public function pie_report()
    {
        $status=[];
        $bending_order_count=Order::where('status','bending-order-factory')->count();
        $welding_order_count=Order::where('status','welding-order-factory')->count();
        $coloring_order_count=Order::where('status','coloring-order-factory')->count();
        $packing_order_count=Order::where('status','packing-order-factory')->count();
        $sent_order_count=Order::where('status','sent-order-factory')->count();

        $status['سفارش در حال خم کاری']=$bending_order_count;
        $status['سفارش در حال جوش کاری']=$welding_order_count;
        $status['سفارش در حال رنگ آمیزی']=$coloring_order_count;
        $status['سفارش در حال بسته بندی']=$packing_order_count;
        $status['سفارش های ارسال شده']=$sent_order_count;
        return $status;
    }

    public function index(Request $request)
    {
        $order_approved=Order::whereIn('status',['approved-order-factory','bending-order-factory','welding-order-factory','coloring-order-factory','packing-order-factory'])->get();
        $order_approved_count=$order_approved->count();

        $order_new=Order::whereIn('status',['pending-order-factory','approved-order-CEO'])->get();
        $order_new_count=$order_new->count();

        $order_finished_count=Order::where('status','sent-order-factory')->count();

        $chart_pie_report=$this->pie_report();
        return view('Factory.Dashboard.index',[
            'order_new'                           =>$order_new->take(5),
            'order_new_count'                           =>$order_new_count,
            'order_approved'                          =>$order_approved->take(5),
            'order_approved_count'                          =>$order_approved_count,
            'order_finished_count'                         =>$order_finished_count,
            'order_table'                               =>$order_new->merge($order_approved)->take(5),
            'order_table_count'                               =>$order_new->merge($order_approved)->count(),
            'chart_pie_report'                    =>json_encode($chart_pie_report)
        ]);
    }
}
