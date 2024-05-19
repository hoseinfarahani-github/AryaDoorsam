<?php

namespace App\Exports;
use App\Models\Order\OrderDetail;
use App\Models\Product\Attribute;
use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;


use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Events\AfterSheet;
use Morilog\Jalali\Jalalian;

class ExportOrders implements FromCollection,WithHeadings,WithEvents,ShouldAutoSize
{
    public static $head=[
        'ردیف',
        'شماره سفارش',
        'نام محصول',
        'عرض',
        'طول',
        'کد نصب',
		        'شناسنامه محصول',

        'توضیحات سفارشی',
		
		'تعداد',
        'تاریخ ایجاد',
        'وضعیت سفارش',
        'نام مشتری'
    ];

    public static $orders=null;

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $event->sheet->getDelegate()->setRightToLeft(true);
            },
        ];
    }

    public function setup()
    {
        foreach (Attribute::all() as $item){
        array_push(self::$head,$item->title);
        }

self::$orders=OrderDetail::query()->whereHas('order',function ($query){
	
            return $query->whereIn('status',['pending-order-factory',
                'approved-order-factory',
                'bending-order-factory',
                'welding-order-factory',
                'coloring-order-factory',
                'packing-order-factory',
                'sent-order-factory'
            ]);
           
        })->get();

		;

        //dd(json_decode(OrderDetail::find(11)->attribute_detail));


        foreach (self::$orders as $order){
            $order->product_id=$order->product->title;
            $order['datetime']=Jalalian::fromCarbon($order->created_at);
            unset($order['created_at']);
            unset($order['updated_at']);
            $order['وضعیت سفارش']=__('status.'.$order->order->status) ??  '';

            $tmps=json_decode($order->attribute_detail);
            $order['نام مشتری']=$order->order->client->name();
            foreach (Attribute::all() as $attribute){
                if(property_exists($tmps,$attribute->name)){
                    $c=$attribute->name;
                    $order[__('attribute.'.$attribute->name)]=__('attribute.'.$tmps->$c);
                }
                else{
                    $order[__('attribute.'.$attribute->name)]='';

                }
                if(property_exists($tmps,'special_'.$attribute->name)){
                    $s='special_'.$attribute->name;
                    $order[__('attribute.'.$attribute->name)].='('.(int)$tmps->$s*10 .' mm'.')';
                }

            }
            $order['height']*=10;
            $order['height']=(string)$order['height'].' mm';
            $order['width']*=10;
            $order['width']=(string)$order['width'].' mm';

            unset($order['attribute_detail']);

        }
    }

    public function headings():array
    {
        $this->setup();
        return self::$head;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return (self::$orders);
    }

    public function export()
    {
        $file='orders.xlsx';
        return \Maatwebsite\Excel\Facades\Excel::download(new \App\Exports\ExportOrders,$file);
    }
}
