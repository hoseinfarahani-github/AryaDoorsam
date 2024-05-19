@section('content')
    <div class="page-body">
        <div class="container-fluid">

            <div class="row">
                <!-- chart caard section start -->
                <div class="col-sm-6 col-xxl-3 col-lg-6">
                    <div class="main-tiles border border-5 card-hover  card o-hidden">
                        <div class="custome-3-bg b-r-4 card-body">
                            <div class="media static-top-widget">
                                <div class="media-body p-0">
                                    <span class="m-0">کد نمایندگی</span>

                                    <h4 class="mb-0 counter">{{\Illuminate\Support\Facades\Auth::user()->agent->code}}
                                    </h4>
                                </div>

                                <div class="align-self-center text-center">
                                    <i class="ri-profile-line"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-sm-6 col-xxl-3 col-lg-6">
                    <div class="main-tiles border border-5 card-hover card o-hidden">
                        <div class="custome-1-bg b-r-4 card-body">
                            <div class="media align-items-center static-top-widget">
                                <div class="media-body p-0">
                                    <span class="m-0">تعداد محصولات</span>
                                    <h4 class="mb-0 counter">{{$product_count}}

                                    </h4>
                                </div>
                                <div class="align-self-center text-center">
                                    <i class="ri-shopping-bag-3-line"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xxl-3 col-lg-6">
                    <div class="main-tiles border border-5 card-hover card o-hidden">
                        <div class="custome-2-bg b-r-4 card-body">
                            <div class="media static-top-widget">
                                <div class="media-body p-0">
                                    <span class="m-0">تعداد سفارشات</span>
                                    <h4 class="mb-0 counter">{{$user_order_count}}
                                        <span class="badge badge-light-danger grow">
                                                    <i data-feather="trending-up"></i>0%</span>
                                    </h4>
                                </div>
                                <div class="align-self-center text-center">
                                    <i class="ri-list-ordered"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-sm-6 col-xxl-3 col-lg-6">
                    <div class="main-tiles border border-5 card-hover card o-hidden">
                        <div class="custome-4-bg b-r-4 card-body">
                            <div class="media static-top-widget">
                                <div class="media-body p-0">
                                    <span class="m-0">تعداد مشتری ها</span>
                                    <h4 class="mb-0 counter">{{$user_client_count}}
                                        <span class="badge badge-light-success grow">
                                                    <i data-feather="trending-up"></i>0%</span>
                                    </h4>
                                </div>

                                <div class="align-self-center text-center">
                                    <i class="ri-user-add-line"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- BEGIN : Category section -->
               {{-- <div class="col-12">
                    <div class="card o-hidden card-hover">
                        <div class="card-header border-0 pb-1">
                            <div class="card-header-title p-0">
                                <h4>دسته بندی ها</h4>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="category-slider no-arrow">
                                @foreach($categories as $category)

                                <div style="width: 200px !important;">
                                    <div class="dashboard-category">
                                        <a href="javascript:void(0)" class="category-image">
                                            <img src="{{str_replace('public','storage',optional($category->gallery)->path)}}" class="img-fluid" alt="{{optional($category->gallery)->alt}}">
                                        </a>
                                        <a href="javascript:void(0)" class="category-name">
                                            <h6 class="">{{$category->title}}</h6>
                                        </a>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>--}}
                <!-- END : Category Section -->



                <!-- Sales / Purchase chart start -->
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="card  o-hidden card-hover border border-2">
                        <div class="card-header border-0 pb-1 card-header-top card-header--2 px-0 pt-0">
                            <div class="card-header-title">
                                <h4>فروش / سفارش</h4>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div id="chart-revenue" style="display: none;">
                                {{$chart_revenue_report}}


                            </div>
                            <div id="sales-purchase-chart"></div>
                        </div>
                    </div>
                </div>
                <!-- Sales / Purchase chart end -->





                <!-- Orders chart start-->
                <div class="col-xl-6 ">
                    <div class="h-100">
                        <div class="card o-hidden card-hover border border-2">
                            <div class="card-header border-0">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="card-header-title">
                                        <h4>سفارشات</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="pie-chart"  >
                                    <div id="pie-chart" style="display: none;">
                                        {{$chart_pie_report}}
                                    </div>
                                    <div id="pie-chart-visitors" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Orders chart end-->


                <!-- Recent orders start-->
                <div class="col-xl-12">
                    <div class="card o-hidden card-hover border border-2">
                        <div class="card-header card-header-top card-header--2 px-0 pt-0 ">
                            <div class="card-header-title">
                                <h4>سفارشات اخیر</h4>
                            </div>
                        </div>

                        <div class="card-body p-0">
                            <div>
                                <div class="table-responsive">
                                    @if($user_orders->count() > 0)
                                        <table class="best-selling-table table border-0 all-package">

                                            <tbody>

                                            @foreach($user_orders as $user_order)
                                                <tr>
                                                    <td>
                                                        <div class="best-product-box">
                                                            <div class="product-detail-box">
                                                                <a href="{{route('agent.order.detail',$user_order)}}" style="color: grey; !important;">
                                                                    <h5>{{$user_order->client->name()}}</h5>
                                                                    <h5 style="text-align: right;font-weight: bold !important;">{{$user_order->id}}#</h5>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>



                                                    <td>
                                                        <div class="product-detail-box">

                                                            <h5
                                                            >{{$user_order->created_at->format('Y-m-d')}}</h5>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="product-detail-box">

                                                            <h5 style="font-size: small">کد پیگیری: <span>{{$user_order->tracking_serial}}</span></h5>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="product-detail-box">
                                                            <h5 style="font-size: small !important;">{{json_decode($user_order->address)->province}} - {{json_decode($user_order->address)->county}}</h5>
                                                        </div>
                                                    </td>

                                                    <td class="@if($user_order->status == 'create-order-step-1' || $user_order->status == 'create-order-step-2' ||$user_order->status == 'create-order-step-3')order-pending
                                                    @elseif($user_order->status == 'reject-order-CEO')order-cancle
                                                    @else order-success @endif">

                                                        <span>{{__('status.'.$user_order->status)}}</span>

                                                    </td>
                                                        <td>
                                                            <ul>
                                                            @if($user_order->status == 'create-order-step-1' ||  $user_order->status == 'create-order-step-2' || $user_order->status == 'create-order-step-3')
                                                                <li>
                                                                    <a href="{{route('agent.order.create2',$user_order)}}">
                                                                        <i class="ri-pencil-line"></i>
                                                                    </a>
                                                                </li>
                                                            @endif
                                                            <li>
                                                                <a href="{{route('agent.order.detail',$user_order)}}">
                                                                    <i class="ri-eye-line"></i>
                                                                </a>
                                                            </li>
                                                            @if($user_order->status == 'create-order-step-1' ||  $user_order->status == 'create-order-step-2' || $user_order->status == 'create-order-step-3')
                                                                <li>
                                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                                       data-bs-target="#deleteOrder{{$user_order->id}}">
                                                                        <i class="ri-delete-bin-line"></i>
                                                                    </a>
                                                                </li>
                                                            @endif
                                                            </ul>
                                                        </td>


                                                </tr>
                                            @endforeach

                                            </tbody>

                                        </table>


                                    @if($user_order_count > 4)
                                            <div class="">

                                                <div class="button-box">
                                                    <a href="{{route('agent.order.index')}}" class="btn  btn--yes border  border-2">نمایش بیشتر({{$user_order_count-4}})..</a>
                                                </div>
                                            </div>
                                        @endif

                                    @else
                                        <table class="best-selling-table table border-0">
                                        </table>
                                        <tbody>
                                        <tr>
                                            سفارش معتبری وجود ندارد
                                        </tr>
                                        </tbody>

                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Recent orders end-->

            </div>
        </div>
        <!-- Container-fluid Ends-->
        <div class="modal fade" id="deleteOrder{{$user_order->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
             aria-labelledby="deleteOrder{{$user_order->id}}Label" aria-hidden="true">
            <div class="modal-dialog  modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <h5 class="modal-title" id="deleteOrder{{$user_order->id}}Label">حذف سفارش</h5>
                        <p>آیا از حذف کردن سفارش مطمئن هستید؟</p>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="button-box">
                            <button type="button" class="btn btn--no" data-bs-dismiss="modal">خیر</button>
                            <form method="post" action="{{ route('agent.order.destroy',$user_order) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn  btn--yes btn-primary">بله</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection


@extends('Agent.Layout.layout')

