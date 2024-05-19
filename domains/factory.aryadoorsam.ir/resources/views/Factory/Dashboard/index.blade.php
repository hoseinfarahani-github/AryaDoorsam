@section('content')
    <div class="page-body">
        <div class="container-fluid">

            <div class="row">
                <!-- chart caard section start -->
                <div class="col-sm-6 col-xxl-3 col-lg-6">
                    <div class="main-tiles card-hover border border-2  card o-hidden">
                        <div class="custome-3-bg b-r-4 card-body">
                            <div class="media static-top-widget">
                                <div class="media-body p-0">
                                    <span class="m-0">سفارش های جدید</span>

                                    <h4 class="mb-0 counter">{{$order_new_count}}
                                    </h4>
                                </div>

                                <div class="align-self-center text-center">
                                    <i class="ri-add-circle-line"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-sm-6 col-xxl-3 col-lg-6">
                    <div class="main-tiles border border-2  card-hover card o-hidden">
                        <div class="custome-1-bg b-r-4 card-body">
                            <div class="media align-items-center static-top-widget">
                                <div class="media-body p-0">
                                    <span class="m-0">سفارش های تایید شده</span>
                                    <h4 class="mb-0 counter">{{$order_approved_count}}

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
                    <div class="main-tiles border border-2 card-hover  card o-hidden">
                        <div class="custome-2-bg b-r-4 card-body">
                            <div class="media static-top-widget">
                                <div class="media-body p-0">
                                    <span class="m-0">سفارش های تکمیل شده</span>
                                    <h4 class="mb-0 counter">{{$order_finished_count}}
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
                    <div class="main-tiles border border-2 card-hover  card o-hidden">
                        <div class="custome-4-bg b-r-4 card-body">
                            <div class="media static-top-widget">
                                <div class="media-body p-0">
                                    <span class="m-0">اولین روز کاری خالی</span>
                                    <h4 class="mb-0 counter">1402/1/3 سه شنبه

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






                <!-- Best Selling Product Start -->
                <div class="col-xl-6 col-md-12">
                    <div class="card o-hidden card-hover border border-2">
                        <div class="card-header card-header-top card-header--2 px-0 pt-0">
                            <div class="card-header-title">
                                <h4>برترین محصولات فروخته شده</h4>
                            </div>
                        </div>

                        <div class="card-body p-0">
                            <div>
                                <div class="table-responsive">
                                    <table class="best-selling-table w-image
                                            w-image
                                            w-image table border-0">
                                        <tbody>
                                        {{--@foreach($user_best_selling_product as $ubsp)

                                            <tr>
                                                <td>
                                                    <div class="best-product-box">
                                                        <div class="product-image">
                                                            <img src="{{str_replace('public','/storage',optional($ubsp->gallery->first())->path)}}"
                                                                 class="img-fluid" alt="Product">
                                                        </div>
                                                        <div class="product-name">
                                                            <h6>{{$ubsp->title}}</h6>
                                                        </div>
                                                    </div>
                                                </td>



                                                <td>
                                                    <div class="product-detail-box">
                                                        <h5>تعداد سفارش</h5>
                                                        <h4>62</h4>
                                                    </div>
                                                </td>


                                            </tr>

                                        @endforeach--}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Best Selling Product End -->




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
                        <div class="card o-hidden card-hover border border-2">
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
                                    <div id="pie-chart-visitors"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Orders chart end-->

                <!-- Recent orders start-->
                <div class="col-xl-12">
                    <div class="card o-hidden card-hover border border-2">
                        <div class="card-header card-header-top card-header--2 px-0 pt-0">
                            <div class="card-header-title">
                                <h4>سفارشات اخیر</h4>
                            </div>
                        </div>

                        <div class="card-body p-0">
                            <div>
                                <div class="table-responsive">
                                     @if($order_table_count > 0)
                                    <table class="best-selling-table table border-0 all-package">
                                        <tbody>

                                        @foreach($order_table as $on)
                                            <tr>
                                                <td>
                                                    <div class="best-product-box">
                                                        <div class="product-detail-box">
                                                            <h5>{{$on->client->name()}}</h5>
                                                            <h5 style="text-align: right;font-weight: bold !important;">{{$on->id}}#</h5>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="w-3/4">
                                                                                                        <ol class="progtrckr">
                                                        <li class="@if($on->status == 'create-order-step-1' || $on->status == 'create-order-step-2' || $on->status == 'create-order-step-3')progtrckr-todo @else progtrckr-done  @endif">
                                                            <h5>نماینده</h5>
                                                        </li>

                                                        <li class="@if($on->status == 'reject-order-CEO') progtrckr-cancel @elseif($on->status == 'pending-order-CEO' || $on->status == 'create-order-step-1' || $on->status == 'create-order-step-2' || $on->status == 'create-order-step-3' || $on->status == 'sent-order-agent') progtrckr-todo @else progtrckr-done   @endif">
                                                            <h5>مدیریت</h5>
                                                        </li>

                                                        <li class="@if($on->status=='create-order-step-1' || $on->status=='create-order-step-2' || $on->status=='create-order-step-3' || $on->status=='sent-order-agent' || $on->status=='reject-order-CEO' || $on->status=='pending-order-CEO')
                                                             progtrckr-todo
                                                             @elseif($on->status=='approved-order-CEO' || $on->status=='pending-order-factory')
                                                             progtrckr-primary
                                                             @else
                                                              progtrckr-done
                                                               @endif">
                                                            <h5>تایید کارخانه</h5>
                                                        </li>

                                                        <li class="@if($on->status == 'bending-order-factory'||$on->status == 'welding-order-factory' || $on->status == 'coloring-order-factory' || $on->status == 'packing-order-factory' || $on->status == 'sent-order-factory') progtrckr-done @elseif($on->status == 'approved-order-factory') progtrckr-primary @else progtrckr-todo  @endif">
                                                                <h5>خم کاری</h5>
                                                        </li>


                                                        <li class="@if( $on->status == 'welding-order-factory' || $on->status == 'coloring-order-factory' || $on->status == 'packing-order-factory' || $on->status == 'sent-order-factory') progtrckr-done @elseif($on->status == 'bending-order-factory') progtrckr-primary @else progtrckr-todo  @endif">
                                                                <h5>جوش کاری</h5>
                                                        </li>

                                                        <li class="@if($on->status == 'coloring-order-factory' || $on->status == 'packing-order-factory' || $on->status == 'sent-order-factory') progtrckr-done @elseif($on->status == 'welding-order-factory') progtrckr-primary @else progtrckr-todo  @endif">
                                                                <h5>رنگ آمیزی</h5>
                                                        </li>

                                                        <li class="@if($on->status == 'packing-order-factory' || $on->status == 'sent-order-factory') progtrckr-done @elseif($on->status == 'coloring-order-factory') progtrckr-primary @else progtrckr-todo  @endif">
                                                                <h5>بسته بندی</h5>
                                                        </li>
                                                        <li class="@if($on->status == 'sent-order-factory') progtrckr-done @elseif($on->status == 'packing-order-factory') progtrckr-primary  @else  progtrckr-todo  @endif">
                                                                <h5>ارسال</h5>
                                                        </li>
                                                    </ol>

                                                        </td>

                                                <td>
                                                    <div class="product-detail-box">

                                                        <h5
                                                        >{{$on->created_at->format('Y-m-d')}}</h5>
                                                       

                                                    </div>

                                                </td>



                                                <td>
                                                    <div class="product-detail-box">
                                                        <h5 style="font-size: small !important;">{{json_decode($on->address)->province}} - {{json_decode($on->address)->county}}</h5>
                                                    </div>
                                                </td>

                                                <td class="@if($on->status == 'create-order-step-1' || $on->status == 'create-order-step-2' ||$on->status == 'create-order-step-3')order-pending
                                                    @elseif($on->status == 'reject-order-CEO')order-cancle
                                                    @else order-success @endif">

                                                    <span>{{__('status.'.$on->status)}}</span>

                                                </td>

                                                <td>
                                                    <ul>
                                                        <li>
                                                            <a href="{{route('factory.order.detail',$on)}}">
                                                                <i class="ri-eye-line"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
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


@extends('Factory.Layout.layout')

