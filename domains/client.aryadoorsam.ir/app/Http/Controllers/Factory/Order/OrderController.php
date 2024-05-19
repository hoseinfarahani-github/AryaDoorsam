<?php

namespace App\Http\Controllers\Factory\Order;

use App\Http\Controllers\Factory\FactoryController;
use App\Models\Order\Order;
use Illuminate\Http\Request;

class OrderController extends FactoryController
{
    public function index(Request $request)
    {
        $orders=Order::whereIn('status',['approved-order-CEO','pending-order-factory','approved-order-factory','bending-order-factory','welding-order-factory','coloring-order-factory','packing-order-factory','sent-order-factory'])->get();

        return view('Factory.Order.index',[
            'orders'    => $orders
        ]);
    }

    public function show_detail(Order $order)
    {
        if($order->status == 'create-order-step-1' || $order->status == 'create-order-step-2' || $order->status == 'create-order-step-3' || $order->status == 'sent-order-agent' || $order->status == 'reject-order-CEO' || $order->status == 'pending-order-CEO') abort(403);
        if ($order->status == 'approved-order-CEO')
        {
            $order->update([
                'status' => 'pending-order-factory'
            ]);
        }
        return view('Factory.Order.show',[
            'order' => $order,
            'order_details'=>$order->order_detail
        ]);
    }

    public function approved(Request $request,Order $order)
    {
        $order->update([
            'status'=>'approved-order-factory',
            'production_period' => $request->production_period
        ]);
        return redirect(route('factory.order.detail',$order));

    }
}
