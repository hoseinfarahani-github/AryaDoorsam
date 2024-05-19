@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- Address Start -->
                            <div class="card border border-2">
                                <div class="card-body">
                                    <div class="card-header-2 mb-3">
                                        <h5 style="font-size: small">سفارش های <span>{{$client_name}}</span></h5>
                                    </div>

                                    <div class="save-details-box">
                                        <div class="row g-4">
                                            @foreach($orders as $order)
                                            <div class="col-xl-4 col-md-6 card">
                                                <div class="save-details border border-2">
                                                    <div class="save-name">
                                                        <h5>سفارش شماره {{$order->id}}</h5>
                                                    </div>

                                                    <div class="save-position">
                                                        <h6>{{__('status.'.$order->status)}}</h6>
                                                    </div>

                                                    <div class="save-address">
                                                        <ul class="list-group">


                                                        @foreach($order->order_detail->take(2) as $od)
                                                            <li class="list-group-item"style="text-align: center !important;" >{{$od->product->title}} <span>({{$od->amount}}عدد)</span> </li>
                                                        @endforeach
                                                            @if($order->order_detail->count() > 2)
                                                                <li class="list-group-item" style="text-align: center !important; ">و {{$order->order_detail->count()-2}} محصول دیگر </li>
                                                            @endif
                                                        </ul>
                                                    </div>

                                                    <div class="address m-t-10 m-b-10">
                                                        <?php
                                                            $address=json_decode($order->address);
                                                            ?>
                                                        <p class="address"> آدرس: {{$address->province}},{{$address->province}},{{$address->detail}}</p>
                                                    </div>

                                                    <div class="button">
                                                        @if($order->status == 'create-order-step-1' || $order->status == 'create-order-step-2' || $order->status == 'create-order-step-3')
                                                            <a href="{{route('agent.order.create2',$order)}}" class="btn btn-sm">ویرایش</a>
                                                        @endif
                                                        <a href="{{route('agent.order.detail',$order)}}"
                                                           class="btn btn-sm">نمایش</a>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Address End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@extends('Agent.Layout.layout')


