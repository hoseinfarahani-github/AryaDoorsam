<!DOCTYPE html >
<html lang="en" dir="rtl"><style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: center;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>
<body style="direction: rtl!important;" class="text-right">

<h4>شناسنامه سفارش {{$order_detail->tracking_serial}}</h4>
<?php
$attributes=[];
foreach (json_decode($order_detail->attribute_detail) as $key=>$value )
{
    $attributes[__('attribute.'.$key)]=is_numeric($value) ? $value : __('attribute.'.$value);
}
?>
<table style="width:100%">
    <tr>
        <td>ارتفاع</td>
        <td>عرض</td>
        @foreach($attributes as $key=>$value)

            <td>{{$key}}</td>

        @endforeach
    </tr>

    <tr>
        <td>{{$order_detail->height}}cm</td>
        <td>{{$order_detail->width}}cm</td>

        @foreach($attributes as $key=>$value)

            <td>{{$value}}</td>

        @endforeach
    </tr>

</table>
<div style="border:1px solid black">
    <ul >
        <h4  style="padding: 0px!important;">مشخصات سفارش</h4>
        <li>  نام محصول : {{$order_detail->product->title}}</li>
        <li>شماره پیگیری سفارش : {{$order->tracking_serial}}</li>
    </ul>
</div>
<div style="border:1px solid black;">
    <h4>توضیحات محصول</h4>
    <p>{{$order_detail->description ?? 'سفارش توضیحاتی ندارد'}}</p>
</div>
</body>
</html>

