<?php

namespace App\Http\Controllers\Site;

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

        return view('Site.Support.Tracking.index');
    }

    public function call_up(Request $request)
    {
        //TODO Validation
        $tracking_serial=$request->tracking_serial[0].'-'.$request->tracking_serial[1].'-'.$request->tracking_serial[2];

       $order=Order::where('tracking_serial',$tracking_serial)->firstOrFail();
       //TODO Pluck
       return view('Site.Support.Tracking.call_up',[
           'order'  =>\App\Models\Order\Order::whereId(1)->first(['id','status','tracking_serial'])
       ]);
    }
}
