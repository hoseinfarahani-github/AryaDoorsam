    @section('css')
    <link rel="stylesheet" href="/assets/css/Address.css" />

    @endsection
@section('content')
    <!-- Page Body Start-->
    <div class="page-body-wrapper">
        <!-- tracking section start -->
        <div class="page-body">
            <!-- tracking table start -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
					@if($errors->any())
                            <div class="alert alert-danger" role="alert">

                                @foreach($errors->all() as $error)
                                    <li> {{$error}} </li>
                                @endforeach

                            </div>
                        @endif
                        <div class="card">
                            <div class="card-body">
                                <div class="title-header title-header-block package-card">
                                    <div>
                                        <h5>سفارش #{{$order->id}}</h5>
                                    </div>
                                    <div class="card-order-section">
                                        <ul>
                                            <li> تاریخ سفارش {{$order->created_at->format('Y/m/d')}}</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="bg-inner cart-section order-details-table">
                                    <div class="row g-4">
                                        <div class="col-xl-8">
                                            <div class="table-responsive table-details">
                                                <table class="table cart-table table-borderless">
                                                    <thead>
                                                    <tr>
                                                        <th colspan="2">محصولات</th>
                                                        <th colspan="4"></th>
                                                    </tr>
                                                    </thead>


                                                    @foreach($order_details as $od)
                                                        <tbody>

                                                        <tr class="table-order">
                                                            <td style="min-width: 10px!important;">
                                                                <p>{{$loop->index+1}}</p>
                                                            </td>
                                                            <td style="min-width: 10px!important;">
                                                                <a href="javascript:void(0)">
                                                                    <img src="{{str_replace('public','/storage',$od->product->gallery->first()->path)}}"
                                                                         class="img-fluid blur-up lazyload" alt="">
                                                                </a>
                                                            </td>
                                                            <td style="min-width: 10px!important;">
                                                                <p>{{$od->product->title}}</p>
                                                            </td>
                                                            <td style="min-width: 10px!important;">
                                                                <p style="text-align: center !important;">{{$od->amount}} عدد </p>
                                                                <h5 style="text-align: center !important;">{{$od->height*10}}mm * {{$od->width*10}}mm</h5>
                                                            </td>
                                                            <td style="min-width: 10px!important;">
                                                                <ul class="product-info-list product-info-list-2" style="font-size: 75% !important;">
                                                                    @foreach(json_decode($od->attribute_detail) as $key=>$value)
                                                                        <li>{{__('attribute.'.$key)}} :
                                                                            <a href="javascript:void(0)">
                                                                             <span style="color: #0a7e68; font-weight: bold !important;">
                                                                                 {{str_contains(__('attribute.'.$value),'attribute') ? $value : __('attribute.'.$value)}}
                                                                             </span>
                                                                            </a></li>
                                                                    @endforeach
                                                                </ul>
                                                            </td>
                                                            <td style="min-width: 5px !important;">
                                                                <ul>
                                                                    <li>
                                                                        <a data-bs-toggle="modal" data-bs-target="#note{{$od->id}}" href="javascript:void(0)">
                                                                            <i class="ri-file-2-line"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="{{route('factory.order.detail.factor.show',$od)}}" >
                                                                            <i class="ri-printer-line"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                        <div class="modal fade theme-modal view-modal" id="note{{$od->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                                                             aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered  modal-fullscreen-sm-down">
                                                                <div class="modal-content">
                                                                    <div class="modal-header p-0">
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                                            <i data-feather="x"></i>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <a>{!! $od->description !!}</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    @endforeach




                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="order-success">
                                                <div class="row g-4">
                                                    <h4>جزئیات سفارش</h4>
                                                    <ul class="order-details">
                                                        <li>شماره سفارش: {{$order->id}}</li>
                                                        <li>تاریخ سفارش: {{$order->created_at}}</li>
                                                    </ul>

                                                    <h4>مشخصات مشتری</h4>
                                                    <ul class="order-details">
                                                        <li>نام مشتری: {{$order->client->name()}}</li>
                                                        <?php
                                                            $address= json_decode($order->address);
                                                        ?>


                                                        <li>استان: {{$address->province}}</li>
                                                        <li>شهر: {{$address->county}}</li>
                                                        <li>{{$address->detail}}</li>
                                                        <li>شماره تماس:
                                                        <a href="tel:{{$address->phone}}" style="direction: ltr">{{$address->phone}}</a>
                                                        </li>
                                                        <li>کد پستی: {{$address->postalCode}}</li>
                                                    </ul>

                                                </div>
                                            </div>
                                            @if($order->status == 'pending-order-factory')
                                                <div class="order-success m-t-10">
                                                    <div class="row g-4">
                                                        <h4>تایید سفارش</h4>
                                                                <form method="POST" action="{{ route('factory.order.approved',$order) }}">
                                                                    @csrf
                                                                    <div class="mb-4 row">
                                                                        <div class="col-sm-12">
                                                                            <label for="production_period">تاریخ تخمین تولید</label>
                                                                            <input class="form-control datepicker"  id="production_period" name="production_period" placeholder="{{jdate()->format('d/m/Y')}}" autocomplete="off">
                                                                        </div>

                                                                    </div>
                                                                    <div class="button-box">
                                                                        <button type="submit" class="btn  btn--yes btn-primary">شروع تولید</button>
                                                                    </div>
                                                                </form>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="order-success m-t-10">
                                                    <div class="row g-4">
                                                        <h4>وضعیت سفارش</h4>
                                                        <div class="col-xxl-12">
                                                            <a class="btn text-white">
                                                               {{__('status.'.$order->status)}}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>


                                    </div>
                                </div>
                                <!-- section end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- tracking table end -->
            <ol class="progtrckr">
                <li class="@if($order->status == 'create-order-step-1' || $order->status == 'create-order-step-2' || $order->status == 'create-order-step-3')progtrckr-todo @else progtrckr-done  @endif">
                    <h5>نماینده</h5>
                    <h6>@if($order->status == 'create-order-step-1' || $order->status == 'create-order-step-2' || $order->status == 'create-order-step-3') در حال انجام @else {{$order->orederStatus->where('status','sent-order-agent')->first()->getdate()}}  @endif</h6>
                </li>

                <li class="@if($order->status == 'reject-order-CEO') progtrckr-cancel @elseif($order->status == 'pending-order-CEO' || $order->status == 'create-order-step-1' || $order->status == 'create-order-step-2' || $order->status == 'create-order-step-3' || $order->status == 'sent-order-agent') progtrckr-todo @else progtrckr-done   @endif">
                    <h5>مدیریت</h5>
                    <h6>
                        @if($order->status == 'reject-order-CEO')رد شده
                        @elseif($order->status == 'create-order-step-1' || $order->status == 'create-order-step-2' || $order->status == 'create-order-step-3') انجام نشده @elseif($order->status == 'sent-order-agent' || $order->status == 'pending-order-CEO') انجام نشده   @else {{$order->orederStatus->where('status','approved-order-CEO')->first()->getdate()}}   @endif
                    </h6>
                </li>

                <li class="@if($order->status=='create-order-step-1' || $order->status=='create-order-step-2' || $order->status=='create-order-step-3' || $order->status=='sent-order-agent' || $order->status=='reject-order-CEO' || $order->status=='pending-order-CEO')
                 progtrckr-todo
                 @elseif($order->status=='approved-order-CEO' || $order->status=='pending-order-factory')
                 progtrckr-primary
                 @else
                  progtrckr-done
                   @endif">
                    <h5>تایید کارخانه</h5>
                    <h6>@if($order->status=='create-order-step-1' || $order->status=='create-order-step-2' || $order->status=='create-order-step-3' || $order->status=='sent-order-agent' || $order->status=='reject-order-CEO' || $order->status=='pending-order-CEO')  انجام نشده
                        @elseif($order->status=='approved-order-CEO' || $order->status=='pending-order-factory') در حال انجام  @else {{$order->orederStatus->where('status','approved-order-factory')->first()->getdate()}}  @endif</h6>
                </li>

                <li class="@if($order->status == 'bending-order-factory'||$order->status == 'welding-order-factory' || $order->status == 'coloring-order-factory' || $order->status == 'packing-order-factory' || $order->status == 'sent-order-factory') progtrckr-done @elseif($order->status == 'approved-order-factory') progtrckr-primary @else progtrckr-todo  @endif">
                    @if($order->status == 'approved-order-factory')
                        <a data-bs-toggle="modal" data-bs-target="#next_step" href="javascript:void(0)">
                            <h5>خم کاری</h5>
                            <h6>@if($order->status == 'bending-order-factory' || $order->status == 'welding-order-factory' || $order->status == 'coloring-order-factory' || $order->status == 'packing-order-factory' || $order->status == 'sent-order-factory') {{$order->orederStatus->where('status','bending-order-factory')->first()->getdate()}}  @elseif($order->status == 'approved-order-factory') در حال انجام  @else انجام نشده @endif</h6>
                        </a>
                    @else
                            <h5>خم کاری</h5>
                        <h6>@if($order->status == 'bending-order-factory' || $order->status == 'welding-order-factory' || $order->status == 'coloring-order-factory' || $order->status == 'packing-order-factory' || $order->status == 'sent-order-factory') {{$order->orederStatus->where('status','bending-order-factory')->first()->getdate()}}  @elseif($order->status == 'approved-order-factory') در حال انجام  @else انجام نشده @endif</h6>
                    @endif


                </li>


                <li class="@if( $order->status == 'welding-order-factory' || $order->status == 'coloring-order-factory' || $order->status == 'packing-order-factory' || $order->status == 'sent-order-factory') progtrckr-done @elseif($order->status == 'bending-order-factory') progtrckr-primary @else progtrckr-todo  @endif">
                    @if($order->status == 'bending-order-factory')
                        <a data-bs-toggle="modal" data-bs-target="#next_step" href="javascript:void(0)">
                           <h5>جوش کاری</h5>
                           <h6>@if($order->status == 'coloring-order-factory' || $order->status == 'packing-order-factory' || $order->status == 'sent-order-factory') {{$order->orederStatus->where('status','bending-order-factory')->first()->getdate()}} @elseif($order->status == 'bending-order-factory') در حال انجام@else انجام نشده  @endif</h6>
                       </a>
                    @else
                        <h5>جوش کاری</h5>
                        <h6>@if( $order->status == 'welding-order-factory' || $order->status == 'coloring-order-factory' || $order->status == 'packing-order-factory' || $order->status == 'sent-order-factory') {{$order->orederStatus->where('status','bending-order-factory')->first()->getdate()}} @elseif($order->status == 'bending-order-factory') در حال انجام@else انجام نشده  @endif</h6>
                    @endif
                </li>

                <li class="@if($order->status == 'coloring-order-factory' || $order->status == 'packing-order-factory' || $order->status == 'sent-order-factory') progtrckr-done @elseif($order->status == 'welding-order-factory') progtrckr-primary @else progtrckr-todo  @endif">
                    @if($order->status == 'welding-order-factory')
                        <a data-bs-toggle="modal" data-bs-target="#next_step" href="javascript:void(0)">
                            <h5>رنگ آمیزی</h5>
                            <h6>@if($order->status == 'coloring-order-factory' || $order->status == 'packing-order-factory' || $order->status == 'sent-order-factory') {{$order->orederStatus->where('status','welding-order-factory')->first()->getdate()}} @elseif($order->status == 'welding-order-factory') در حال انجام @else انجام نشده  @endif</h6>
                        </a>
                    @else
                        <h5>رنگ آمیزی</h5>
                        <h6>@if($order->status == 'coloring-order-factory' || $order->status == 'packing-order-factory' || $order->status == 'sent-order-factory') {{$order->orederStatus->where('status','welding-order-factory')->first()->getdate()}} @elseif($order->status == 'welding-order-factory') در حال انجام @else انجام نشده  @endif</h6>
                    @endif
                </li>

                <li class="@if($order->status == 'packing-order-factory' || $order->status == 'sent-order-factory') progtrckr-done @elseif($order->status == 'coloring-order-factory') progtrckr-primary @else progtrckr-todo  @endif">
                    @if($order->status == 'coloring-order-factory')
                        <a data-bs-toggle="modal" data-bs-target="#next_step" href="javascript:void(0)">
                            <h5>بسته بندی</h5>
                            <h6>@if($order->status == 'packing-order-factory' || $order->status == 'sent-order-factory') {{$order->orederStatus->where('status','coloring-order-factory')->first()->getdate()}} @elseif($order->status == 'coloring-order-factory') درحال انجام @else  انجام نشده @endif</h6>
                        </a>
                    @else
                        <h5>بسته بندی</h5>
                        <h6>@if($order->status == 'packing-order-factory' || $order->status == 'sent-order-factory') {{$order->orederStatus->where('status','coloring-order-factory')->first()->getdate()}} @elseif($order->status == 'coloring-order-factory') درحال انجام @else  انجام نشده @endif</h6>
                    @endif

                </li>
                <li class="@if($order->status == 'sent-order-factory') progtrckr-done @elseif($order->status == 'packing-order-factory') progtrckr-primary  @else  progtrckr-todo  @endif">
                    @if($order->status == 'packing-order-factory')
                        <a data-bs-toggle="modal" data-bs-target="#next_step" href="javascript:void(0)">
                            <h5>ارسال</h5>
                            <h6>@if($order->status == 'sent-order-factory') انجام شده @else {{$order->production_period ?? 'تعیین نشده'}}  @endif</h6>
                        </a>

                    @elseif($order->status == 'sent-order-factory')
                        <h5>{{$order->orederStatus->where('status','packing-order-factory')->first()->getdate()}}</h5>

                        <h6> {{$order->production_period ?? 'تعیین نشده'}} </h6>
                    @else
                        <h5>ارسال</h5>
                        <h6>@if($order->status == 'sent-order-factory') انجام شده @else {{$order->production_period ?? 'تعیین نشده'}}  @endif</h6>
                    @endif

                </li>
            </ol>
        </div>
        <!-- tracking section End -->
    </div>
    <div class="modal fade" id="next_step" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <h5 class="modal-title" id="staticBackdropLabel">تغییر وضعیت سفارش</h5>
                    <p>آیا از تغییرات مطمئن هستید؟</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="button-box">
                        <button type="button" class="btn btn--no" data-bs-dismiss="modal">خیر</button>
                        <form method="POST" action="{{ route('factory.order.change.status',$order) }}">
                            @csrf
                            <button type="submit" class="btn  btn--yes btn-primary">بله</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Page Body End-->
@endsection
    @section('js')
        <script src="/assets/js/Address.js"></script>
                <script src="/factory/assets/js/order.js"></script>
        <script>
            $(document).ready(function() {
                $(".datepicker").datepicker();
            });
        </script>
    @endsection

@component('Factory.Layout.layout')
    @slot('breadcrump')
        <div class="-intro-x breadcrumb ml-auto hidden sm:flex">
            <a  class="" >صفحه اصلی</a>
        </div>
    @endslot
@endcomponent
