<?php

namespace App\Http\Controllers\factory\Order;

use App\Http\Controllers\Controller;
use App\Models\Order\OrderDetail;
use Elibyy\TCPDF\Facades\TCPDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Facade;

class OrderDetailController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->seo()
            ->setDescription('پنل مدیرعامل آریادرسام');
    }

    public function print(OrderDetail $orderDetail)
    {
        $this->seo()->setTitle('شناسنامه سفارش شماره '.$orderDetail->tracking_serial);
      //  return view('Factory.order.data_sheet',['order_detail'=>$orderDetail,'order'=>$orderDetail->order]);

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        $attributes=[];
        foreach (json_decode($orderDetail->attribute_detail) as $key=>$value )
            {
            $attributes[__('attribute.'.$key)]=is_numeric($value) ? $value : __('attribute.'.$value);
            }
              $filename = str_replace('/','',$orderDetail->tracking_serial).'.pdf';
        $html=view()->make('Factory.Order.data_sheet',['order_detail'=>$orderDetail,'order'=>$orderDetail->order,])->render();
        $pdf::SetTitle($orderDetail->tracking_serial);
        $pdf::AddPage('L', 'A5');
        $pdf::SetFont('dejavusans', '', 11, '', true);
        $pdf::setRTL(true);
        $pdf::writeHTML($html,true,0,true,0);
        $this->dir(public_path('Order//'.$orderDetail->order->tracking_serial));
        $this->dir(storage_path('Order//'.$orderDetail->order->tracking_serial));
        $path=public_path('Order//'.$orderDetail->order->tracking_serial.'//').$filename;
        $pdf::Output($path, 'F');
        $pdf::reset();
       // return response()->download($path);
    }

    public function dir($directory):void
    {
        if(!file_exists($directory))mkdir($directory,'0777','true');
    }

    public function factorShow(OrderDetail $orderDetail)
    {
        //TODO Validation security
        return redirect( '/factor/'.$orderDetail->order->tracking_serial.'/'.str_replace('/','',$orderDetail->tracking_serial).'.pdf');
    }
}
