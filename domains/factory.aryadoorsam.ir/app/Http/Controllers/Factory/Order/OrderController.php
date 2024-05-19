<?php

namespace App\Http\Controllers\Factory\Order;

use App\Http\Controllers\Factory\FactoryController;
use App\Models\Order\OrderDetail;
use App\Models\Order\Order;
use Illuminate\Http\Request;
use App\Models\Order\OrderStatus;
use Elibyy\TCPDF\Facades\TCPDF;
use Morilog\Jalali\Jalalian;



class OrderController extends FactoryController
{
    protected $order_status_array=['create-order-step-1',
        'create-order-step-2',
        'create-order-step-3',
        'sent-order-agent',
        'reject-order-CEO',
        'approved-order-CEO',
        'pending-order-CEO',
        'pending-order-factory',
        'approved-order-factory',
        'bending-order-factory',
        'welding-order-factory',
        'coloring-order-factory',
        'packing-order-factory',
        'sent-order-factory'];


	 public function __construct()
    {
        parent::__construct();
        $this->seo()
            ->setTitle('سفارشات')
            ->setDescription('پنل کارخانه آریادرسام');
    }

    public function index(Request $request)
    {
        $orders=Order::whereIn('status',['approved-order-CEO','pending-order-factory','approved-order-factory','bending-order-factory','welding-order-factory','coloring-order-factory','packing-order-factory','sent-order-factory'])->get();

        return view('Factory.Order.index',[
            'orders'    => $orders
        ]);
    }

	    public function graphic_index()
    {
        return view('Factory.Order.graphicIndex',[
            'orders' => Order::all()->whereIn('status',[
                'approved-order-CEO',
                'pending-order-factory',
                'approved-order-factory',
                'bending-order-factory',
                'welding-order-factory',
                'coloring-order-factory',
                'packing-order-factory',
                'sent-order-factory'
               ])
        ]);
    }

	    public function create_PDF(OrderDetail $orderDetail)
    {

        $this->seo()->setTitle('شناسنامه سفارش شماره '.$orderDetail->tracking_serial);
        //  return view('Factory.order.data_sheet',['order_detail'=>$orderDetail,'order'=>$orderDetail->order]);
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf::reset();
        $filename = str_replace('/','',$orderDetail->tracking_serial).'.pdf';
        $html=view()->make('Factory.Order.data_sheet',['order_detail'=>$orderDetail,'order'=>$orderDetail->order])->render();
        $pdf::SetTitle($orderDetail->tracking_serial);
        $pdf::SetMargins(0, 10, 10,10);
        $pdf::SetAutoPageBreak(true, 0);
        
        $pdf::AddPage('L', 'C6');
        $pdf::SetFont('dejavusans', '', 11, '', true);
        $pdf::writeHTML($html,true,0,true,0,'C');
        $this->dir(public_path('factor/'.$orderDetail->order->tracking_serial));
        $path=public_path('factor/'.$orderDetail->order->tracking_serial.'/').$filename;
        $pdf::Output($path, 'F');

          //return response()->download($path);
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
			$request->validate([
           'production_period'=>'required' 
        ]);

		
		

        foreach ($order->order_detail as $od){
            $this->create_PDF($od);
        }

    $date=explode('/',$request->production_period);
       
        OrderStatus::create([
            'order_id'=>$order->id,
            'status'=>'approved-order-factory',
            'created_at'=>jdate()
        ]);
		
        $order->update([
            'status'=>'approved-order-factory',
            'production_period' => $date[2].'/'.$date[1].'/'.$date[0]
        ]);
		
		

        return redirect(route('factory.order.detail',$order));

    }

	    public function change_status(Request $request,Order $order)
    {
        $current_status=$order->status;
        $array_search=array_search($current_status,$this->order_status_array);
        OrderStatus::create([
            'order_id'=>$order->id,
            'status'=>$this->order_status_array[$array_search+1],
            'created_at'=>jdate()
        ]);
        $order->update([
            'status'=>$this->order_status_array[$array_search+1]
        ]);
        return redirect(route('factory.order.detail',$order));
    }


public function dir($directory):void
    {
	//	$directory=str_replace('/home/aryadoo2/domains/',)
	   //$directory = substr($directory, 1);

		//dd($directory);
        if(!file_exists($directory))mkdir($directory, 0755, true);
    }

    public function all(Order $order)
    {
        dd($order);
    }

	

}
