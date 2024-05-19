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
                        <div class="card card-table">
                            <div class="card-body">
                                <div class="title-header option-title">
                                    <h5>لیست سفارشات</h5>

                                </div>
                                <div class="flex-justify-end m-b-5">

                                    <a href="#" class="btn btn-solid m-r-5"><i class="ri-file-chart-line">
                                        </i>Export PDF</a>
                                    <a href="{{route('factory.export.excel.download')}}" class="btn btn-solid"><i class="ri-file-chart-line">
                                        </i>Export EXCEL</a>
                                </div>
                                <div>
                                    <div class="table-responsive">
                                        <table class="table all-package order-table theme-table" id="table_id">
                                            <thead>
                                            <tr>
                                                <th style="color: #4a5568 !important;">شماره سفارش</th>
                                                <th style="color: #4a5568 !important;">نام مشتری</th>
                                                <th style="color: #4a5568 !important;">وضعیت</th>
												<th style="color: #4a5568 !important;">کد پیگیری</th>
                                                <th style="color: #4a5568 !important;">تاریخ سفارش</th>
                                                <th style="color: #4a5568 !important;"> </th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @foreach($orders as $order)
                                                <tr data-bs-toggle="offcanvas" href="#order-details">
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

													<td>{{$order->tracking_serial}}</td>

                                                    <td>{{$order->created_at->format('Y/m/d')}}</td>

                                                    <td>
                                                        <ul>
                                                            @if($order->status != 'pending-order-factory'
                                                                && $order->status != 'approved-order-CEO')
                                                                <li>
                                                                    <a class="tooltip-show" title="پرینت گروهی"
                                                                       href="{{route('factory.order.factor.all',$order)}}">
                                                                        <i class="ri-file-chart-line"></i>
                                                                    </a>
                                                                </li>
                                                            @else
                                                                <li>
                                                                    <a class="tooltip-show" title="پرینت گروهی" style="pointer-events: none;">
                                                                        <i class="ri-file-chart-line text-danger"></i>
                                                                    </a>
                                                                </li>
                                                            @endif
                                                            <li>
                                                                <a href="{{route('factory.order.detail',$order)}}">
                                                                    <i class="ri-eye-line"></i>
                                                                </a>
                                                            </li>

															<li>
                                                                <a class="" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapse{{$order->id}}" aria-expanded="true" aria-controls="collapse{{$order->id}}"><i
                                                                        class="ri-list-check"></i>
                                                                </a>
                                                            </li>

                                                        </ul>
                                                    </td>
                                                </tr>

                                            @endforeach
                                            </tbody>
                                        </table>
										                                        @foreach($orders as $order)
                                            <div id="collapse{{$order->id}}" class="accordion-collapse collapse"
                                                 aria-labelledby="heading{{$order->id}}" data-bs-parent="#accordionExample">
                                                <div class="accordion-body card border border-2" style="margin-top:30px!important; ">

                                                    <label style="margin-top: -35px!important; width: 200px!important; color:#4a5568;background-color:#ecf3fa !important ; border-radius: 24px; text-align: center;font-weight: bold  ">{{$order->id}}#  {{$order->client->name()}}</label>

                                                    <table class="table all-package order-table theme-table">
                                                        <thead>
                                                        <tr>
                                                            <th style="min-width: 10px!important; color: #4a5568 !important;"> ردیف</th>
                                                            <th style="color: #4a5568 !important;">شناسه محصول</th>
                                                            <th style="color: #4a5568 !important;">نام محصول</th>
                                                            <th style="color: #4a5568 !important;">ابعاد</th>
                                                            <th style="color: #4a5568 !important;"></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($order->order_detail as $od)
                                                            <tr data-bs-toggle="offcanvas">
                                                                <td>
                                                                    <span>
                                                                        {{$loop->index+1}}
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <a class="d-block">
                                                                <span> #
                                                                   {{$od->tracking_serial ?? ''}}
                                                                </span>
                                                                    </a>
                                                                </td>

                                                                <td>
                                                                    <div class="user-name">
                                                        <span>
                                                            {{$od->product->title}}
                                                        </span>
                                                                    </div>
                                                                </td>
                                                                <td class="">
                                                        <span>
                                                            {{$od->width*10}}mm * {{$od->height*10}}mm
                                                        </span>
                                                                </td>

                                                                @if(isset($od->description))
                                                                    <td class="order-cancle">
                                                                        <span>سفارشی هست</span>
                                                                    </td>
                                                                @else
                                                                    <td class="order-success">
                                                                    <span>سفارشی نیست</span>
                                                                </td>
                                                                @endif


                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>

                                                    {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab ad adipisci, <span class="fw-bold"> blanditiis culpa cumque debitis, fuga laboriosam laudantium necessitatibus nulla quasi quo, sint soluta vel voluptate! Expedita ipsam iure reiciendis?</span></p>--}}
                                                </div>
                                            </div>
                                        @endforeach

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
                <script src="/Factory/assets/js/order.js"></script>
    @endsection

@component('Factory.Layout.layout')
    @slot('breadcrump')
        <div class="-intro-x breadcrumb ml-auto hidden sm:flex">
            <a  class="" >صفحه اصلی</a>
        </div>
    @endslot
@endcomponent
