    @section('css')
    <link rel="stylesheet" href="/assets/css/Address.css" />
    @endsection
@section('content')

    <!-- Page Body Start-->
    <div class="page-body-wrapper">
        <!-- Order section Start -->
        <div class="page-body">
            <!-- Table Start -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card border border-2 card-table">
                            <div class="card-body">
                                <div class="title-header option-title">
                                    <h5>لیست سفارشات</h5>

                                </div>
                                <div>

                                    @if(!!request()->query('sort'))
                                        <div class="m-b-20" style="display: flex;height: 40px;justify-content: start!important;">

                                            <h5 class="align-items-center border border-1" style=" border-radius:0.25rem;display: flex;justify-content: space-between !important;">{{__('sort.order-'.request()->query('sort')['sort_by'])}} : {{__('sort.'.request()->query('sort')['order_by']) }}
                                                <a href="{{request()->fullUrlWithoutQuery('sort')}}"> <i data-feather="x" style="height: 10px"></i> </a>
                                            </h5>

                                        </div>
                                    @endif

                                    <div class="table-responsive">
                                        <table class="table all-package order-table theme-table" id="table_id">
                                            <thead>
                                            <tr>
                                                <th style="color: #4a5568 !important;">
                                                    @if(!!request()->query('sort') && (request()->query('sort')['order_by'] == 'descending' && request()->query('sort')['sort_by'] == 'id'))

                                                        <a href="{{request()->fullUrlWithQuery(['sort'=>['order_by' => 'ascending','sort_by'=> 'id']])}}"> <i class="ri-arrow-down-line w-2 h-2" ></i>شماره سفارش</a>
                                                    @elseif(!!request()->query('sort') && (request()->query('sort')['order_by'] == 'ascending' && request()->query('sort')['sort_by'] == 'id'))

                                                        <a href="{{request()->fullUrlWithQuery(['sort'=>['order_by' => 'descending','sort_by'=> 'id']])}}"> <i class="ri-arrow-up-line w-2 h-2 "></i>شماره سفارش</a>
                                                    @else
                                                        <a href="{{request()->fullUrlWithQuery(['sort'=>['order_by' => 'descending','sort_by'=> 'id']])}}">شماره سفارش</a>
                                                    @endif
                                                </th>
                                                <th style="color: #4a5568 !important;">نام مشتری</th>
                                                <th style="color: #4a5568 !important;">وضعیت</th>
                                                <th style="color: #4a5568 !important;">
                                                    @if(!!request()->query('sort') && (request()->query('sort')['order_by'] == 'descending' && request()->query('sort')['sort_by'] == 'tracking_serial'))

                                                        <a href="{{request()->fullUrlWithQuery(['sort'=>['order_by' => 'ascending','sort_by'=> 'tracking_serial']])}}"> <i class="ri-arrow-down-line w-2 h-2" ></i>شماره پیگیری</a>
                                                    @elseif(!!request()->query('sort') && (request()->query('sort')['order_by'] == 'ascending' && request()->query('sort')['sort_by'] == 'tracking_serial'))

                                                        <a href="{{request()->fullUrlWithQuery(['sort'=>['order_by' => 'descending','sort_by'=> 'tracking_serial']])}}"> <i class="ri-arrow-up-line w-2 h-2 "></i>شماره پیگیری</a>
                                                    @else
                                                        <a href="{{request()->fullUrlWithQuery(['sort'=>['order_by' => 'descending','sort_by'=> 'tracking_serial']])}}">شماره پیگیری</a>
                                                    @endif
                                                </th>
                                                <th style="color: #4a5568 !important;">
                                                    @if(!!request()->query('sort') && (request()->query('sort')['order_by'] == 'descending' && request()->query('sort')['sort_by'] == 'created_at'))

                                                        <a href="{{request()->fullUrlWithQuery(['sort'=>['order_by' => 'ascending','sort_by'=> 'created_at']])}}"> <i class="ri-arrow-down-line w-2 h-2" ></i>تاریخ سفارش</a>
                                                    @elseif(!!request()->query('sort') && (request()->query('sort')['order_by'] == 'ascending' && request()->query('sort')['sort_by'] == 'created_at'))

                                                        <a href="{{request()->fullUrlWithQuery(['sort'=>['order_by' => 'descending','sort_by'=> 'created_at']])}}"> <i class="ri-arrow-up-line w-2 h-2 "></i>تاریخ سفارش</a>
                                                    @else
                                                        <a href="{{request()->fullUrlWithQuery(['sort'=>['order_by' => 'descending','sort_by'=> 'created_at']])}}">تاریخ سفارش</a>
                                                    @endif
                                                </th>
                                                <th style="color: #4a5568 !important;"> </th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @foreach($orders as $order)
                                                <tr >
                                                    <td>
                                                        <a class="d-block">
                                                                <span> #
                                                                   {{$order->id}}
                                                                </span>
                                                        </a>
                                                    </td>

                                                    <td>
                                                        <div class="user-name">
                                                        <span>
                                                            {{$order->client->name()}}
                                                        </span>
                                                        </div>
                                                    </td>

                                                    <td class="@if($order->status == 'create-order-step-1' || $order->status == 'create-order-step-2' ||$order->status == 'create-order-step-3')order-pending
                                                        @elseif($order->status == 'reject-order-CEO')order-cancle
                                                        @else order-success @endif">
                                                        <span>
                                                            {{__('status.'.$order->status)}}
                                                        </span>
                                                    </td>

                                                    <td>{{$order->tracking_serial ?? 'ندارد'}}</td>

                                                    <td>{{$order->created_at->format('Y/m/d')}}</td>

                                                    <td>
                                                        <ul>

                                                            @if($order->status == 'create-order-step-1' ||  $order->status == 'create-order-step-2' || $order->status == 'create-order-step-3')
                                                                <li>
                                                                    <a href="{{route('agent.order.create2',$order)}}">
                                                                        <i class="ri-pencil-line"></i>
                                                                    </a>
                                                                </li>
                                                            @endif
                                                                <li>
                                                                    <a href="{{route('agent.order.detail',$order)}}">
                                                                        <i class="ri-eye-line"></i>
                                                                    </a>
                                                                </li>
                                                                @if($order->status == 'create-order-step-1' ||  $order->status == 'create-order-step-2' || $order->status == 'create-order-step-3')
                                                                <li>
                                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                                   data-bs-target="#deleteOrder{{$order->id}}">
                                                                    <i class="ri-delete-bin-line"></i>
                                                                </a>
                                                            </li>
                                                            @endif
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <div class="modal fade" id="deleteOrder{{$order->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                     aria-labelledby="deleteOrder{{$order->id}}Label" aria-hidden="true">
                                                    <div class="modal-dialog  modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <h5 class="modal-title" id="deleteOrder{{$order->id}}Label">حذف سفارش</h5>
                                                                <p>آیا از حذف کردن سفارش مطمئن هستید؟</p>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                <div class="button-box">
                                                                    <button type="button" class="btn btn--no" data-bs-dismiss="modal">خیر</button>
                                                                    <form method="post" action="{{ route('agent.order.destroy',$order) }}">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn  btn--yes btn-primary">بله</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>



                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table End -->

            <!-- footer start-->

        </div>
        <!-- Order section End -->
    </div>
    <!-- Page Body End-->
@endsection
    @section('js')
        <script src="/assets/js/Address.js"></script>
                <script src="/agent/assets/js/order.js"></script>
    @endsection

@extends('Agent.Layout.layout')
