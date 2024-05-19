<?php

namespace App\Http\Controllers\Agent\Order;

use App\Http\Controllers\Agent\AgentController;
use App\Models\Location\Province;
use App\Models\Order\Order;
use App\Models\Order\OrderDetail;
use App\Models\Order\OrderStatus;
use App\Models\Product\Product;
use App\Models\User\Client;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Morilog\Jalali\Jalalian;
use function Laravel\Prompts\text;

class OrderController extends AgentController
{
    public function __construct()
    {
        parent::__construct();
        $this->seo()
            ->setTitle('سفارشات آریادرسام')
            ->setDescription('پنل نمایندگان آریادرسام');
    }

    public function index()
    {

        return view('Agent.Order.index',[
            'orders' => Auth::user()->order
        ]);
    }

    public function create()
    {

        \session()->forget('order');
        $this->seo()->setTitle('سفارش جدید');
        return view('Agent.Order.create1',[
            'provinces'     => Province::all(),
            'clients'       =>Client::query()->where('agent_id','=',Auth::user()->agent_id)->get()

        ]);
    }

    public function storeClient(Request $request)
    {
        $address['province']=$request->province;
        $address['county']=$request->county;
        $address['postalCode']=$request->postalCode;
        $address['detail']=$request->address_detail;
        $address['phone']=$request->phone;

        //TODO create order and json address

        $order=Order::query()->insertGetId([
            'address'           => json_encode($address),
            'agent_id'          => Auth::user()->agent_id,
            'client_id'         => $request->client_id,
            'tracking_serial'   =>$this->generateCode(),
            'status'            => 'create-order-step-1',
            'created_at'        => Jalalian::now(),
            'updated_at'        => Jalalian::now()
        ]);

        $request->session()->put('order',$order);
        return redirect(route('agent.order.create2',[
            'order'=>$order
        ]));


    }

    public function storeClient2(Request $request)
    {
     dd('asd');
    }

    public function addProduct(Request $request,Product $product)
    {
        //TODO Validation
        $attribute=[];
        foreach ($request->all() as $key=>$value) {
             if (str_starts_with($key, 'attribute_')){
                $attribute[str_replace('attribute_','',$key)]=$value;
            }
        }

        OrderDetail::create([
            'order_id'              => $request->order_id,
            'product_id'            => $product->id,
            'amount'                => $request->amount,
            'height'                => $request->height,
            'width'                => $request->width,
            'attribute_detail'      => json_encode($attribute)
        ]);
        return redirect(route('agent.order.create2',[
            'order'=>Order::find($request->order_id)
        ]));
    }

    public function create2(Order $order)
    {
        if($order->status == 'create-order-step-1') $order->update(['status'=>'create-order-step-2']);
        if($order->status == 'create-order-step-3') $order->update(['status'=>'create-order-step-2']);
        if( $order->status == 'create-order-step-2'){
            return view('Agent.Order.create2',[
                'order'             => $order,
                'products'          => Product::all(),
                'order_detail'      => $order->order_detail
            ]);
        }else{
            return redirect(route('agent.order.index'));
        }
    }

    public function create3(Order $order)
    {
        if ($order->status == 'sent-order-agent') return redirect(route('agent.order.index'));

        if($order->status == 'create-order-step-2'){
            $order->update([
                'status' => 'create-order-step-3'
            ]);
        }
        return view('Agent.Order.create3',[
            'order'  => $order
        ]);
    }

    public function finalStore(Order $order,Request $request)
    {
        //TODO Validation
        OrderStatus::create([
            'order_id'=>$order->id,
            'status'=>'sent-order-agent'
        ]);
        $order->update([
            'note'      => 'یادداشت نماینده : ' . $request->note,
            'status'    => 'sent-order-agent'
        ]);
        return redirect(route('agent.dashboard.index'));
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return back();
    }

    public function show_detail(Order $order)
    {
        return view('Agent.Order.show',[
            'order' => $order,
            'order_details'=>$order->order_detail
        ]);
    }

    public function destroyDetail(OrderDetail $orderDetail)
    {
        $orderDetail->delete();
        return back();
    }

    public function updateOrderDetail(Request $request,OrderDetail $orderDetail)
    {
        //TODO Validation
        $attribute=[];
        foreach ($request->all() as $key=>$value) {
            if (str_starts_with($key, 'attribute_')){
                $attribute[str_replace('attribute_','',$key)]=$value;
            }
        }

        $orderDetail->update([
            'order_id'              => $request->order_id,
            'amount'                => $request->amount,
            'height'                => $request->height,
            'width'                => $request->width,
            'attribute_detail'      => json_encode($attribute)
        ]);
        return back();
    }

    private function generateCode()
    {
        $year=substr(jdate()->getYear(),'02');         //2digits
        $month=jdate()->getMonth();
        if (strlen($month) ==1) $month='0'.$month;           //2digits
        $day=jdate()->getDay();
        if (strlen($day) ==1) $day='0'.$day;                //2digits
        $agent_code=Auth::user()->agent->code;
        $end=mt_rand(0000,9999);                            //4digits
        return $year.$month.'-'.$day.$agent_code.'-'.$end;
    }
}
