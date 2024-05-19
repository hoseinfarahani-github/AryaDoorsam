<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Admin\AdminController;
use App\Models\Order\Order;
use App\Models\User\Client;
use Illuminate\Http\Request;
use App\Models\User\Agent;
class OrderController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->seo()->setTitle('سفارش ها')
            ->setDescription('پنل ادمین');
    }

    public function index(Request $request)
    {
         $orders = Order::all();
         return view('Admin.Order.index',[
           'orders'    => $orders,
         ]);
    }

    public function create()
    {
         //
    }

    public function show(Order $order)
    {
         //
    }

    public function edit(Order $order)
    {
         //
    }

    public function update(Request $request,Order $order)
    {
        //
    }

    public function destroy(Order $order)
    {
          foreach ($order->orederStatus as $os){
            $os->delete();
        }
        foreach ($order->order_detail as $od){
            $od->delete();
        }
        $order->delete();
        toast('حذف سفارش با موفقیت انجام شد','success');
        return back();
    }

}
