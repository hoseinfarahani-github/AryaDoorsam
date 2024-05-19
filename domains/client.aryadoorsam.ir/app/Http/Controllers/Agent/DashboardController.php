<?php

namespace App\Http\Controllers\Agent;

use App\Models\Order\Order;
use App\Models\Product\Category;
use App\Models\Product\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Morilog\Jalali\Jalalian;

class DashboardController extends AgentController
{
    static $month=[
        '1'=>'فروردین',
        '2'=>'اردیبهشت',
        '3'=>'خرداد',
        '4'=>'نیر',
        '5'=>'مرداد',
        '6'=>'شهریور',
        '7'=>'مهر',
        '8'=>'آبان',
        '9'=>'آذر',
        '10'=>'دی',
        '11'=>'بهمن',
        '12'=>'اسفند',
    ];

    public function __construct()
    {
        parent::__construct();
        $this->seo()
            ->setTitle('پنل نمایندگان آریادرسام')
            ->setDescription('پنل نمایندگان آریادرسام');

    }

    public function revenue_report()
    {
        $month=['0','0','0','0','0','0','0','0','0','0','0','0','0'];
        $order=Order::query()->where('agent_id','=',Auth::user()->agent->id)->where('created_at','>',Jalalian::now()->subMonths('5'))
            ->where('created_at','<',Jalalian::now())
            ->get();
        foreach ($order as $od){
            $month[$od->created_at->month]++;
        }
        return array_filter($month);
    }

    public function pie_report()
    {

        $draft_order_count=Auth::user()->order
            ->whereIn('status',['create-order-step-1','create-order-step-2','create-order-step-3','sent-order-agent','pending-order-CEO'])->count();
        $rejected_order_count=Auth::user()->order
            ->where('status','reject-order-CEO')->count();
        $approved_order_count=Auth::user()->order->count()-($rejected_order_count+$draft_order_count);

        $status['تایید شده']=$approved_order_count;
        $status['رد شده']=$rejected_order_count;
        $status['معلق']=$draft_order_count;
    return $status;
    }


    public function index(Request $request)
    {
       // dd(Auth::user()->order[1]->order_detail);
        $chart_revenue_report=$this->revenue_report();
        $chart_pie_report=$this->pie_report();
        //TODO $user_best_selling_product

        $user_best_selling_product=Product::all()->take(3);

        $user_order=Auth::user()->order->take(4);
        $product_count=Product::all()->count();
        $user_order_count=Auth::user()->order->count();
        $user_client_count=Auth::user()->client->count();
        return view('Agent.Dashboard.index',[
            'user_order_count'                  => $user_order_count,
            'user_client_count'                   => $user_client_count,
            'user_orders'                             => $user_order,
            'categories'                                   => Category::all(),
            'product_count'                               => $product_count,
            'user_best_selling_product'                 => $user_best_selling_product,
            'chart_revenue_report'                    =>json_encode($chart_revenue_report),
            'chart_pie_report'                    =>json_encode($chart_pie_report)
        ]);
    }
}
