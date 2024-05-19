<?php

namespace App\Http\Controllers\Manager\Order;

use App\Http\Controllers\Manager\ManagerController;
use App\Models\Order\Order;
use App\Models\Order\OrderDetail;
use App\Models\Order\OrderStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends ManagerController
{
    public function __construct()
    {
        parent::__construct();
        $this->seo()
            ->setTitle('سفارشات آریادرسام')
            ->setDescription('پنل مدیرعامل آریادرسام');
    }

    public function index()
    {

        return view('Manager.Order.index',[
            'orders' => Order::all()->whereNotIn('status',['create-order-step-1','create-order-step-2','create-order-step-3'])->reverse()
        ]);
    }
	 public function graphic_index()
	 {
		 return view('Manager.Order.graphicIndex',[
            'orders' => Order::all()->whereNotIn('status',['create-order-step-1','create-order-step-2','create-order-step-3'])
        ]);
	 }

    public function show_detail(Order $order)
    {

        if($order->status == 'create-order-step-1' || $order->status == 'create-order-step-2' || $order->status == 'create-order-step-3') abort(403);
        if ($order->status == 'sent-order-agent')
            {
                $order->update([
                    'status' => 'pending-order-CEO'
                ]);
            }

        $mergedItems = $order->order_detail->groupBy(function ($item) {
            // Define the important properties for merging
            return $item->product_id . '|' . $item->width. '|' . $item->height. '|' . $item->attribute_detail;
        })->map(function ($group) {
            $mergedItem = $group->first();
            $mergedItem->amount = $group->sum('amount');

            // Merge other properties as needed
            $mergedItem->otherProperty1 = $group->pluck('created_at')->unique()->values();
            return $mergedItem;
        });

        return view('Manager.Order.show',[
            'order' => $order,
            'order_details'=>$mergedItems
        ]);
    }



    public function reject(Request $request,Order $order)
    {
        //TODO Validation here
        OrderStatus::create([
            'order_id'=>$order->id,
            'status'=>'reject-order-CEO',
			'created_at'=>jdate()

        ]);
        $order->update([
        'status'        => 'reject-order-CEO',
        'note'  => $order->note .' پاسخ مدیرعامل : ' . $request->note_order
        ]);
        return back();
    }
    public function approved(Request $request,Order $order)
    {
        //TODO Validation here
        OrderStatus::create([
            'order_id'=>$order->id,
            'status'=>'approved-order-CEO',
			'created_at'=>jdate()

        ]);
        $order->update([
            'status'        => 'approved-order-CEO',
            'note'  => $order->note .' پاسخ مدیرعامل : ' . $request->note_order
        ]);
        return back();
    }
}
