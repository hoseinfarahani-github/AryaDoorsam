<?php

namespace App\Http\Controllers\Agent\Order;

use App\Http\Controllers\Agent\AgentController;
use App\Http\Controllers\Agent\fileTrait;
use App\Models\Location\Province;
use App\Models\Order\Order;
use App\Models\Order\OrderDetail;
use App\Models\Order\OrderStatus;
use App\Models\Order\SalesRepresentative;
use App\Models\Product\Product;
use App\Models\User\Client;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use function Laravel\Prompts\text;

class OrderController extends AgentController
{

	    use fileTrait;

    public function __construct()
    {
        parent::__construct();
        $this->seo()
            ->setTitle('سفارشات آریادرسام')
            ->setDescription('پنل نمایندگان آریادرسام');
    }

    public function index()
    {

        if(Auth::user()->agent->order->count() == 0) return view('Agent.Order.index',['orders'=>[]]);

        return view('Agent.Order.index',[
            'orders' => $this->SortByColumn(Auth::user()->agent->order->toQuery())->latest()->get()
        ]);
    }
	    public function graphic_index()
    {
        return view('Agent.Order.graphicIndex',[
            'orders' => Auth::user()->agent->order->reverse()
        ]);
    }


    public function create()
    {

        \session()->forget('order');
        $this->seo()->setTitle('سفارش جدید');
        return view('Agent.Order.create1',[
            'provinces'     => Province::all(),
            'clients'       =>Client::query()->where('agent_id','=',Auth::user()->agent_id)->get(),
            'salesRepresentatives'=>SalesRepresentative::all()

        ]);
    }

    public function storeClient(Request $request)
    {

        $request->validate([
           'client_id'=>['required']
        ]);
        $address['province']=$request->province;
        $address['county']=$request->county;
        $address['postalCode']=$request->postalCode;
        $address['detail']=$request->address_detail;
        $address['phone']=$request->phone;

        //TODO create order and json address

        $order=Order::query()->insertGetId([
            'address'                   => json_encode($address),
            'agent_id'                  => Auth::user()->agent_id,
            'client_id'                 => $request->client_id,
            'sales_representative_id'   =>$request->salesRepresentative,
            'status'                    => 'create-order-step-1',
            'created_at'                => now(),
            'updated_at'                => now()
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
        $request->validate([
           'amount'=>['required'],
           'height'=>['required'],
           'width'=>['required']
        ]);
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
			'support_serial'        => $request->support_serial,
            'description'           =>$request->orderDetailDescription,
            'attribute_detail'      => json_encode($attribute)
        ]);

        return redirect(route('agent.order.create2',[
            'order'=>Order::find($request->order_id)
        ]));
    }

    public function addProductMulti(Request $request,Product $product)
    {
        $attribute=[];
        foreach ($request->all() as $key=>$value) {
            if (str_starts_with($key, 'attribute_')){
                $attribute[str_replace('attribute_','',$key)]=$value;
            }
        }
        for ($i=0;$i<$request->amount;$i++){
            OrderDetail::create([
                'order_id'              => $request->order_id,
                'product_id'            => $product->id,
                'amount'                => 1,
                'height'                => $request->height ?? 0,
                'width'                => $request->width ?? 0,
				'support_serial'        => $request->support_serial,
                'attribute_detail'      => json_encode($attribute)
            ]);
        }


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
        $tacking_code=$this->generateCode();

        foreach ($order->order_detail as $key=>$ood){
           $key+=1;
            if(strlen($key)==1) $key2='00'.$key;
            elseif(strlen($key)==2) $key2='0'.$key;
            else $key2=$key;

            $ood->update([
                'tracking_serial'=>$tacking_code.'/'.$key2
            ]);
        }
        //TODO Validation
        OrderStatus::create([
            'order_id'=>$order->id,
            'status'=>'sent-order-agent',
            'created_at'=>jdate()

        ]);
        $order->update([
            'note'      => 'یادداشت نماینده : ' . $request->note,
            'tracking_serial'   =>$tacking_code,
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
			'support_serial'        => $request->support_serial,
            'description'           =>$request->orderDetailDescription,
            'attribute_detail'      => json_encode($attribute)
        ]);
				if(!!$request->file('file')){
		        $this->file_store($request->file('file'), OrderDetail::class, $orderDetail->id, $request->order_id);

				}

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
        $like=$year.$month.$day.$agent_code;
        $count=Auth::user()->agent->order;
        if($count->count() !=0) $count=$count->toQuery()->where('tracking_serial','like','%'.$year.$month.$day.$agent_code.'%')->get()->count();
        $count++;
        if(strlen($count)==1) $count='0'.$count;
        return $like.$count;
    }

	 public function set_support_serial(Request $request)
    {
        //TODO Validation
        $orderDetail=OrderDetail::whereId($request->id)->first();
        $orderDetail->update([
          'support_serial'=>$request->value,
        ]);

        //TODO return Response
        //TODO error
        return response()->json(array('success'=>true));

    }

	 public function multiDestroy(Request $request)
    {
        $data=$request->except('_token','_method','deleteAll');
        foreach ($data as $key=>$value) {
            OrderDetail::find($value)->delete();
        }
        toast('رکورد های موردنظر با موفقیت حذف شد','success');
        return back();
    }

}
