<?php

namespace app\Http\Controllers\Site\Support;

use App\Http\Controllers\Controller;
use App\Models\Order\Order;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function __construct()
    {
    $this->seo()
        ->setTitle('پیگیری سفارش آریادرسام')
        ->setDescription('پیگیری سفارشات');
    }
    public function trackingIndex()
    {
        dd('123');

        return view('Site.Support.Tracking.index');
    }

    public function call_up(Request $request)
    {
        //TODO Validation
        $tracking_serial=$request->tracking_serial;


       $order=Order::where('tracking_serial',$tracking_serial)->firstOrFail();
       //TODO Pluck
		
	   return view('Site.Support.Tracking.call_up',[
           'order'  =>$order,
		   'orderStatus'=>$order->orederStatus->reverse()

       ]);
    }
}
