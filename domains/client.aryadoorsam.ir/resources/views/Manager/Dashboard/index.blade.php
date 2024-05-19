@section('content')
    <div class="page-body">
        <div class="container-fluid">

            <div class="row">
                <!-- chart card section start -->

                <div class="col-sm-6 col-xxl-3 col-lg-6">
                    <div class="main-tiles border-5 border-0  card-hover card o-hidden">
                        <div class="custome-1-bg b-r-4 card-body">
                            <div class="media align-items-center static-top-widget">
                                <div class="media-body p-0">
                                    <span class="m-0">تعداد نمایندگان</span>
                                    <h4 class="mb-0 counter">
                                        {{$agent_count}}
                                    </h4>
                                </div>
                                <div class="align-self-center text-center">
                                    <i class="ri-account-box-line"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xxl-3 col-lg-6">
                    <div class="main-tiles border-5 card-hover border-0 card o-hidden">
                        <div class="custome-2-bg b-r-4 card-body">
                            <div class="media static-top-widget">
                                <div class="media-body p-0">
                                    <span class="m-0"> تعداد سفارشات باز</span>
                                    <h4 class="mb-0 counter">{{$order_count_open}}
                                        <span class="badge badge-light-danger grow">
                                                    <i data-feather="trending-up"></i>0%</span>
                                    </h4>
                                </div>
                                <div class="align-self-center text-center">
                                    <i class="ri-folder-open-line"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xxl-3 col-lg-6">
                    <div class="main-tiles border-5 card-hover border-0 card o-hidden">
                        <div class="custome-2-bg b-r-4 card-body">
                            <div class="media static-top-widget">
                                <div class="media-body p-0">
                                    <span class="m-0"> تعداد سفارشات بسته</span>
                                    <h4 class="mb-0 counter">{{$order_count_close}}
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
                    <div class="main-tiles border-5 card-hover border-0 card o-hidden">
                        <div class="custome-4-bg b-r-4 card-body">
                            <div class="media static-top-widget">
                                <div class="media-body p-0">
                                    <span class="m-0">تعداد مشتری ها</span>
                                    <h4 class="mb-0 counter">{{$client_count}}
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
                    <div class="card  o-hidden card-hover">
                        <div class="card-header border-0 pb-1 card-header-top card-header--2 px-0 pt-0">
                            <div class="card-header-title">
                                <h4>فروش / سفارش</h4>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div id="chart-revenue" style="display: none;">
                                {{$chart}}


                            </div>
                            <div id="sales-purchase-chart"></div>
                        </div>
                    </div>
                </div>
                <!-- Sales / Purchase chart end -->

                <!-- Earning chart star-->
               {{-- <div class="col-xl-6">
                    <div class="card o-hidden card-hover">
                        <div class="card-header border-0 mb-0">
                            <div class="card-header-title">
                                <h4>Earning</h4>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div id="bar-chart-earning"></div>
                        </div>
                    </div>
                </div>--}}
                <!-- Earning chart end-->


                <!-- Orders chart start-->
                <div class="col-xl-6 ">
                    <div class="h-100">
                        <div class="card o-hidden card-hover">
                            <div class="card-header border-0">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="card-header-title">
                                        <h4>سفارشات</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="pie-chart">
                                    <div id="pie-chart" style="display: none;">
                                        {{$chart_pie_report}}
                                    </div>
                                    <div id="pie-chart-visitors">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Orders chart end-->
                <!-- Recent orders start-->
                <div class="col-xl-12">
                    <div class="card o-hidden card-hover">
                        <div class="card-header card-header-top card-header--2 px-0 pt-0">
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
                                                                <h5>{{$user_order->client->name()}}</h5>
                                                                <h5 style="text-align: right;font-weight: bold !important;">{{$user_order->id}}#</h5>
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
                                                            <h5 style="font-size: small !important;">نماینده</h5>
                                                            <h5 style="font-size: small !important;">{{$user_order->agent->user->username}}({{$user_order->agent->code}})</h5>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="product-detail-box">
                                                            <h5 style="font-size: small !important;">مشتری</h5>
                                                            <h5 style="font-size: small !important;">{{$user_order->client->name()}}</h5>
                                                        </div>
                                                    </td>

                                                    <td class="@if($user_order->status == 'create-order-step-1' || $user_order->status == 'create-order-step-2' ||$user_order->status == 'create-order-step-3')order-pending
                                                    @elseif($user_order->status == 'reject-order-CEO')order-cancle
                                                    @else order-success @endif">

                                                        <span>{{__('status.'.$user_order->status)}}</span>

                                                    </td>


                                                </tr>
                                            @endforeach

                                            </tbody>

                                        </table>
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



@endsection


@extends('Manager.Layout.layout')

