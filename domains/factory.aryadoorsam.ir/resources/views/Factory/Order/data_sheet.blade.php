<style>
    @font-face {
        font-family: "btitr";
        src: url("https://www.factory.aryadoorsam.ir/storage/assets/font/BTITRBD.TTF");
    }
</style>


<!doctype html>

<html lang="en">
<body align="center" style="font-family: btitr;">

{{--<br><br> <br>--}}
<table border="1" cellpadding="3" align="center"
       style="height: 10cm;font-weight: bold;">
    <tr>
        <td height="47" width="150" rowspan="3"><img src="https://www.factory.aryadoorsam.ir/assets/image/logo_factor.jpg" alt=""></td>
        <td height="47" align="center" width="300" colspan="2">

            {{$order_detail->product->title}}
        </td>
    </tr>
    @php
        $attribute=json_decode($order_detail->attribute_detail);
    @endphp
    <tr>
        <td height="47" width="150" align="center">
            ارتفاع
            {{$order_detail->height}}cm
        </td>

        <td height="47" width="150" align="center">

            عرض
            {{$order_detail->width}}cm
        </td>
    </tr>
    <tr>
        <td height="47" width="150" align="center">
            @if(property_exists($attribute,'special_color') && $attribute->color =='custom')
                کد رنگ :
                {{$attribute->special_color}}
            @elseif(property_exists($attribute,'color'))
                رنگ :
                {{__('attribute.'.$attribute->color)}}
            @else
                رنگ : نامشخص
            @endif

        </td>

        <td height="47" width="150" align="center">
            جهت باز شدن:
            @if($attribute->opening_direction=='right')
                راست
            @elseif($attribute->opening_direction=='left')
                چپ
            @else
                نامشخص
            @endif
        </td>


    </tr>
    <tr>
        <td height="47" width="150" rowspan="3"><br/></td>
        <td height="47" align="right" width="300">کد سرویس
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
            ندارد
            <br/>
            کد محل نصب :
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            @if(isset($order_detail->support_serial))
                {{$order_detail->support_serial}}
            @else
                ندارد
            @endif
            <br><br></td>
    </tr>
    <tr>
        <td height="47" align="center" width="300">{{$order_detail->tracking_serial}}</td>
    </tr>
</table>

</body>
</html>
